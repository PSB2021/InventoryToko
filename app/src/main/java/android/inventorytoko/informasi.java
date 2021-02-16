package android.inventorytoko;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.util.Linkify;
import android.widget.TextView;

public class informasi extends AppCompatActivity {

    private TextView txttentang;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_informasi);

        txttentang = (TextView) findViewById(R.id.etxtentang);
        txttentang.setText("OLEH : \n" +
                "RIDO WAHYUDI \n" +
                "------------------------ \n" +
                "FATIMAH ZAHRA \n");
        // proses menambahkan Links pada TextView
        Linkify.addLinks(txttentang, Linkify.ALL);
    }
}
