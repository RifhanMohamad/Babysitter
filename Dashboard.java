package com.bitp3453.babysitter.activities;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.View;

import com.bitp3453.babysitter.R;

public class Dashboard extends AppCompatActivity implements View.OnClickListener {
    private CardView nursery, map, booking;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dashboard);
        //defining Cards
        nursery = (CardView) findViewById(R.id.nursery_card);
        map = (CardView) findViewById(R.id.map_card);
        booking = (CardView) findViewById(R.id.booking_card);

        //Add Click listener to the cards
        nursery.setOnClickListener(this);
        map.setOnClickListener(this);
        booking.setOnClickListener(this);

    }

    @Override
    public void onClick(View v) {
        Intent i;

        switch (v.getId()) {
            case R.id.nursery_card : i = new Intent(this, MainActivity.class); startActivity(i); break;
            case R.id.map_card : i = new Intent(this, MapsActivity.class);  startActivity(i); break;
            case R.id.booking_card : i = new Intent(this, Booking.class);  startActivity(i); break;
            default:break;
        }


    }
}
