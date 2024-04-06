/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Connection;

import java.sql.Connection;
import java.sql.SQLException;

public class Principal {

    public static void main(String[] args) throws SQLException {
        Connection conn = null;
        Conexion conx = new Conexion();
        conn = conx.getConexion();
        String consulta = "SELECT C.NOMBRE, C.PESO, R.TIPO_RAZA  \n" +
                          "FROM CANINO C \n" +
                          "INNER JOIN RAZA R ON C.ID_RAZA = R.ID_RAZA"; 
        
        StringBuilder resultados = conx.ejecutaStatement(consulta, conn, "NOMBRE", "PESO", "RAZA");      
        String[] opciones = resultados.toString().split("\n");
 
        String opcionSeleccionada = (String) JOptionPane.showInputDialog(
                null,
                "Selección de perro:",
                "Selecciona un perro:",
                JOptionPane.QUESTION_MESSAGE,
                null,
                opciones,
                opciones[0]);
        
        if (opcionSeleccionada != null) {
            JOptionPane.showMessageDialog(null, opcionSeleccionada);
        } else {
            JOptionPane.showMessageDialog(null, "No se ha seleccionado ninguna perro.");
        }
    }
    
}
