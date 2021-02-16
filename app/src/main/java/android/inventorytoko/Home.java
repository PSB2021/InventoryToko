package android.inventorytoko;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

public class Home extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        Button btn=(Button)findViewById(R.id.lihatbtn);
        Button btn2=(Button)findViewById(R.id.infobtn);
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                //tombol btn menuju list data
                Intent inte = new Intent(Home.this, MainActivity.class);
                startActivity(inte);
            }
        });
        btn2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                //tombol btn2 menuju info data
                Intent inte = new Intent(Home.this, informasi.class);
                startActivity(inte);
            }
        });
    }
}

