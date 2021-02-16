package android.inventorytoko;
import java.io.Serializable;

class Hero {
    private int id;
    private String nama,merek;
    private String jumlah;
    private String tempat;

    public Hero(int id, String nama, String merek, String jumlah, String tempat) {
        this.id = id;
        this.nama = nama;
        this.merek = merek;
        this.jumlah = jumlah;
        this.tempat = tempat;
    }

    public int getId() {
        return id;
    }

    public String getNama() {
        return nama;
    }

    public String getMerek() {
        return merek;
    }

    public String getJumlah() {
        return jumlah;
    }

    public String getTempat() {
        return tempat;
    }
}