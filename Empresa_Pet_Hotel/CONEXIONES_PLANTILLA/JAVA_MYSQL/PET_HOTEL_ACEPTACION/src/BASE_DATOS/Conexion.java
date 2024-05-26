package BASE_DATOS;

import java.sql.Statement;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.swing.JOptionPane;

public class Conexion {
    private final String USUARIO = "root";
    private final String CONTRASEÑA = "";
    private final String URLCONEXION = "jdbc:mysql://localhost:3306/WEB_PET?zeroDateTimeBehavior=CONVERT_TO_NULL";
    
    private Connection conexion;
    Statement stm;
    ResultSet rs;
    
    public Connection getConexion() throws SQLException {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver"); 
            conexion = DriverManager.getConnection(URLCONEXION, USUARIO, CONTRASEÑA);
        } catch (ClassNotFoundException c) {
            System.out.println("Error al conectarse a la base de datos " + c);
        }
        return conexion;
    }
    
    public boolean crearStatement1(Connection conexion, String tabla, String usuario, String contra) throws SQLException {
        int id = 0;
        conexion.setAutoCommit(false);                       
        try {
            String query_ct = "SELECT COUNT(*) AS total FROM " + tabla;
            try (Statement stm = conexion.createStatement(); ResultSet rs = stm.executeQuery(query_ct)) {
                if (rs.next()) {
                    id = rs.getInt("total")+1;
                }
            }
            
            String query = "INSERT INTO " + tabla + " VALUES (?, ?, ?)";
            try (PreparedStatement pst = conexion.prepareStatement(query)) {
                pst.setInt(1, id);
                pst.setString(2, usuario);
                pst.setString(3, contra);
                pst.executeUpdate();
            }

            conexion.commit();
            JOptionPane.showMessageDialog(null, "Registro concluido.");
            return true;
        } catch (SQLException e) {
            conexion.rollback();
            JOptionPane.showMessageDialog(null, "Error de SQL: " + e.getMessage());
            return false;
        }
    }
    
    public boolean crearStatement2(Connection conexion, String tabla, String nombre, String ape, String dni, String cel, String tipoH, String tipo, Double Precio) throws SQLException {
        int total_D = 0;
        int total_H = 0;
        conexion.setAutoCommit(false);                       
        try {
            String query_ct = "SELECT COUNT(*) AS total FROM " + tabla;
            try (Statement stm = conexion.createStatement(); ResultSet rs = stm.executeQuery(query_ct)) {
                if (rs.next()) {
                    total_D = rs.getInt("total") + 1;
                    total_H = rs.getInt("total") + 1;
                }
            }

            String query = "INSERT INTO DatosCuenta VALUES (?, ?, ?, ?, ?)";
            try (PreparedStatement pst = conexion.prepareStatement(query)) {
                pst.setInt(1, total_D);
                pst.setString(2, nombre);
                pst.setString(3, ape);
                pst.setString(4, dni);
                pst.setString(5, cel);
                pst.executeUpdate();
            }
            
            // Insertar nuevo registro en Comprobante
            query = "INSERT INTO Habitaciones VALUES (?, ?, ?, ?)";
            try (PreparedStatement pst = conexion.prepareStatement(query)) {
                pst.setInt(1, total_H);
                pst.setString(2, tipoH);
                pst.setDouble(3, Precio);
                pst.setString(4, tipo);
                pst.executeUpdate();
            }
            
            // Insertar nuevo registro en ComprobanteC
            query = "INSERT INTO DatosH VALUES (?, ?)";
            try (PreparedStatement pst = conexion.prepareStatement(query)) {
                pst.setInt(1, total_D);
                pst.setInt(2, total_H);
                pst.executeUpdate();
            }

            conexion.commit();
            JOptionPane.showMessageDialog(null, "Registro concluido.");
            return true;
        } catch (SQLException e) {
            conexion.rollback();
            System.out.println("Error de SQL: " + e.getMessage());
            return false;
        } finally {
            if (conexion != null) {
                conexion.setAutoCommit(true);
            }
        }
    }
    
    public boolean verificaStatement(Connection conexion, String valor, String contra) throws SQLException {
        String query = "SELECT * FROM CUENTAS WHERE USUARIO = ?";
        try (PreparedStatement pstmt = conexion.prepareStatement(query)) {
            pstmt.setString(1, valor);
            try (ResultSet rs = pstmt.executeQuery()) {
                if (rs.next()) {
                    if (rs.getString("CONTRASEÑA").equals(contra)) {
                        return true;
                    } else {
                        JOptionPane.showMessageDialog(null, "La contraseña no es correcta, inténtalo de nuevo.");
                        return false;
                    }
                } else {
                    JOptionPane.showMessageDialog(null, "El usuario no existe.");
                    return false;
                }
            }
        } catch (SQLException e) {
            System.out.println("ERROR: " + e);
            return false;
        }
    }
}
