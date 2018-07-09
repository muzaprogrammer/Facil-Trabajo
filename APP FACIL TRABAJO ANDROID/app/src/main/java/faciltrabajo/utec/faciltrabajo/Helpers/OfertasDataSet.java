package faciltrabajo.utec.faciltrabajo.Helpers;

/**
 * Created by Ricardo on 11/28/2017.
 */

public class OfertasDataSet {
    private int midOfertaEmpleo;
    private String mEmpresa;
    private String mCargo;
    private String mFecha;
    private String mLugar;
    private String mPostulacion;

    public int getIdOfertaEmpleo() {
        return midOfertaEmpleo;
    }

    public void setIdOfertaEmpleo(int midOfertaEmpleo) {
        this.midOfertaEmpleo = midOfertaEmpleo;
    }

    public String getEmpresa() {
        return mEmpresa;
    }

    public void setEmpresa(String mEmpresa) {
        this.mEmpresa = mEmpresa;
    }

    public String getCargo() {
        return mCargo;
    }

    public void setCargo(String mCargo) {
        this.mCargo = mCargo;
    }

    public String getFecha() {
        return mFecha;
    }

    public void setFecha(String mFecha) {
        this.mFecha = mFecha;
    }

    public String getLugar() {
        return mLugar;
    }

    public void setLugar(String mLugar) {
        this.mLugar = mLugar;
    }

    public String getPostulacion() {
        return mPostulacion;
    }

    public void setPostulacion(String mPostulacion) {
        this.mPostulacion = mPostulacion;
    }
}