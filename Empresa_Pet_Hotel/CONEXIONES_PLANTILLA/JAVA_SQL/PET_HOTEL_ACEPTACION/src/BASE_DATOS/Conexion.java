/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package BASE_DATOS;

import java.sql.Statement;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.swing.JOptionPane;

/**
 *
 * @author Alberto Arroyo
 */
public class Conexion {
    private final String USUARIO = "pet_hotel";
    private final String CONTRASEÑA = "1234";
    private final String URLCONEXION = "jdbc:sqlserver://DESKTOP-STBFGEG\\MSSQL:1433;databaseName=WEB_PET;encrypt=true;trustServerCertificate=true;";
    
    private Connection conexion;
    Statement stm;
    ResultSet rs;
    
    public Connection getConexion() throws SQLException{
        try {
        Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver"); 
        conexion = DriverManager.getConnection(URLCONEXION, USUARIO, CONTRASEÑA);
        } catch (ClassNotFoundException c) {
            System.out.println("Error al conectarse a la base de datos " + c);
        }
    return conexion;
    }
    
    public boolean crearStatement1(Connection conexion, String tabla, String usuario, String contra) throws SQLException {
    String total_id = "";
    conexion.setAutoCommit(false);                       
    try {
        // Contar Registros
        String query_ct = "SELECT COUNT(*) AS total FROM " + tabla;
        try (Statement stm = conexion.createStatement(); ResultSet rs = stm.executeQuery(query_ct)) {
            if (rs.next()) {
                int total = rs.getInt("total");
                total_id = String.format("C%03d", total + 1);
            }
        }

        // Insertar nuevo registro
        String query = "INSERT INTO " + tabla + " VALUES (?, ?, ?)";
        try (PreparedStatement pst = conexion.prepareStatement(query)) {
            pst.setString(1, total_id);
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
    String total_D = "";
    String total_H = "";
    conexion.setAutoCommit(false);                       
    try {
        // Contar Registros
        String query_ct = "SELECT COUNT(*) AS total FROM " + tabla;
        try (Statement stm = conexion.createStatement(); ResultSet rs = stm.executeQuery(query_ct)) {
            if (rs.next()) {
                int total = rs.getInt("total");
                total_D = String.format("D%03d", total + 1);
                total_H = String.format("H%03d", total + 1);
            }
        }

        // Insertar nuevo registro
        String query = "INSERT INTO DatosCuenta VALUES (?, ?, ?, ?, ?)";
        try (PreparedStatement pst = conexion.prepareStatement(query)) {
            pst.setString(1, total_D);
            pst.setString(2, nombre);
            pst.setString(3, ape);
            pst.setString(4, dni);
            pst.setString(5, cel);
            pst.executeUpdate();
        }
        
        query = "INSERT INTO Habitaciones VALUES (?, ?, ?, ?)";
        try (PreparedStatement pst = conexion.prepareStatement(query)) {
            pst.setString(1, total_H);
            pst.setString(2, tipoH);
            pst.setDouble(3, Precio);
            pst.setString(4, tipo);
            pst.executeUpdate();
        }
        
        query = "INSERT INTO DatosH VALUES (?, ?)";
        try (PreparedStatement pst = conexion.prepareStatement(query)) {
            pst.setString(1, total_D);
            pst.setString(2, total_H);
            pst.executeUpdate();
        }

        conexion.commit();
        JOptionPane.showMessageDialog(null, "Registro concluido.");
        return true;
    } catch (SQLException e) {
        conexion.rollback();
        System.out.println("Error de SQL: " + e.getMessage());
        return false;
    }
}
    
    public boolean verificaStatement(Connection conexion, String valor, String contra) throws SQLException {
        
        try (PreparedStatement pstmt = conexion.prepareStatement("SELECT * FROM CUENTAS WHERE USUARIO = '" + valor + "'")) {
            try (ResultSet rs = pstmt.executeQuery()) {
                if(rs.next()){
                    if(rs.getString(2).equals(valor) && rs.getString(3).equals(contra)){
                        return true;
                    }else if(rs.getString(2).equals(valor) || rs.getString(3).equals(contra)){
                        JOptionPane.showMessageDialog(null, "La contraseña o el Uuario no es correcto, inténtalo de nuevo. ");
                        return false;
                    }else{
                        return false;
                    }
                }
            }
        } catch (SQLException e) {
            System.out.println("ERROR: " + e);
            return false;
        }
        return false;
    }
}