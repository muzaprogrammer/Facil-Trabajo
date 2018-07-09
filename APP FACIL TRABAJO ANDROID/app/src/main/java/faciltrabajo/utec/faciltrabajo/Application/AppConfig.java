package faciltrabajo.utec.faciltrabajo.Application;

/**
 * Created by Ricardo on 11/26/2017.
 */

public class AppConfig {

    // Direccion URL del servidor para inicio de sesion
    public String UrlSignIn(final String correo, final String password){
        return "http://racrogel26.mypressonline.com/rest?correo_electronico=" + correo + "&password=" + password;
    }

    // Direccion URL del servidor para registro de usuario
    public String UrlSignUp(final String nombres, final String apellidos, final String correo, final String password){
        return "http://racrogel26.mypressonline.com/rest/signup?nombres="+ nombres +"&apellidos="+ apellidos +"&correo_electronico=" + correo + "&password=" + password;
    }

    public String UrlBuscarOferta(final String cargo, final String lugar, final int idUsuario){
        return "http://racrogel26.mypressonline.com/rest/buscarOfertas?cargo=" + cargo + "&lugar=" + lugar + "&idUsuario=" + idUsuario;
    }

    public String UrlDetallesOferta(final int idOferta, final int idUsuario){
        return "http://racrogel26.mypressonline.com/rest/detallesOferta?idOferta=" + idOferta + "&idUsuario=" + idUsuario;
    }

    public String UrlPostulacion(final int idOferta, final int idUsuario){
        return "http://racrogel26.mypressonline.com/rest/postulacion?idOferta=" + idOferta + "&idUsuario=" + idUsuario;
    }

    public String UrlBuscarPostulaciones(final int idUsuario){
        return "http://racrogel26.mypressonline.com/rest/buscarPostulaciones?idUsuario=" + idUsuario;
    }

    public String UrlValidaPostulacion(final int idOferta, final int idUsuario){
        return "http://racrogel26.mypressonline.com/rest/validapostulacion?idOferta=" + idOferta + "&idUsuario=" + idUsuario;
    }
}
