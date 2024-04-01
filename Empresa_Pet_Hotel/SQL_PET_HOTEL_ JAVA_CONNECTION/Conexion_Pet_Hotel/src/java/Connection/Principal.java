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
        /*
        En el primer argumento, introduces la consulta sin ningún alias o algúna función que perjudique o modifique
        cada columna; en el segundo argumento, lo dejas así. En el último argumento, colocas cada nombre de cada columna
        que sacarás con tu consulta
        Ejemplo:
        conx.ejecutaStatement("SELECT H.ID_HISTORIAL,\n" +
"	   H.DESCRIPCIÓN,\n" +
"	   R.ID_RESERVA\n" +
"FROM HISTORIAL H\n" +
"RIGHT JOIN RESERVA R ON H.ID_RESERVA = R.ID_RESERVA\n" +
"ORDER BY H.ID_RESERVA DESC", conn, "NÚMERO HISTORIAL", "DESCRIPCIÓN", "NÚMERO RESERVA");
        */
        conx.ejecutaStatement("Consulta", conn, "Nombres con una cantidad indefinida de argumentos introducidos según"
                                              + "tu consulta saque. Los separas con comas.");
    }
    
}
