/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Connection;

import java.sql.Statement;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;

/**
 *
 * @author Alberto Arroyo
 */
public class Conexion {
    private final String USUARIO = "pet_hotel";
    private final String CONTRASEÑA = "1234";
    private final String URLCONEXION = "jdbc:sqlserver://DESKTOP-STBFGEG\\MSSQL:1433;databaseName=PET_HOTEL;encrypt=true;trustServerCertificate=true;";
    
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
    public StringBuilder ejecutaStatement(String query, Connection conexion, String... columnas) throws SQLException {
        StringBuilder mensaje = new StringBuilder();
        try {
            stm = conexion.createStatement();
            rs = stm.executeQuery(query);
                        
            while (rs.next()) {
                for (int i = 0; i < columnas.length; i++) {
                    mensaje.append(columnas[i]).append(": ").append(rs.getString(i + 1));
                    if (i < columnas.length - 1) {
                        mensaje.append("    ");
                    }
                }
                mensaje.append("\n");
            }
        } catch (SQLException e) {
            mensaje.append("Error: " + e);
        } finally {
            if (rs != null) {
                try {
                    rs.close();
                } catch (SQLException e) {
                    mensaje.append("Error: " + e);
                }
            }
            if (stm != null) {
                try {
                    stm.close();
                } catch (SQLException e) {
                    mensaje.append("Error: " + e);
                }
            }
            if (conexion != null) {
                try {
                    conexion.close();
                } catch (SQLException e) {
                    mensaje.append("Error: " + e);
                }
            }
        }
        return mensaje;
    }
}
