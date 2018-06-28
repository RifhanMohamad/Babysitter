package com.bitp3453.babysitter.activities;

import android.content.Intent;
import android.support.design.widget.CollapsingToolbarLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.bitp3453.babysitter.R ;
import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;

public class NurseryActivity extends AppCompatActivity {

    Button btnBooking;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_nursery);

        //hide the default actionbar
        getSupportActionBar().hide();

        //Receive data

        String name = getIntent().getExtras().getString("nursery_name");
        String descriptions = getIntent().getExtras().getString("nursery_description");
        String location = getIntent().getExtras().getString("nursery_location");
        String categories = getIntent().getExtras().getString("nursery_category");
        String ratings = getIntent().getExtras().getString("nursery_rating");
        String image_url = getIntent().getExtras().getString("nursery_img");

        //ini views
        CollapsingToolbarLayout collapsingToolbarLayout = findViewById(R.id.collapsingtoolbar_id);
        collapsingToolbarLayout.setTitleEnabled(true);


        TextView tv_name = findViewById(R.id.aa_nursery_name);
        TextView tv_location = findViewById(R.id.aa_location);
        TextView tv_categorie = findViewById(R.id.aa_categories);
        TextView tv_description = findViewById(R.id.aa_description);
        TextView tv_rating = findViewById(R.id.aa_rating);
        ImageView img = findViewById(R.id.aa_thumbnail);

//        btnBooking = (Button) findViewById(R.id.btnPassData);
//        btnBooking.setOnClickListener(this);

        //setting values to each view

        tv_name.setText(name);
        tv_categorie.setText(categories);
        tv_description.setText(descriptions);
        tv_rating.setText(ratings);
        tv_location.setText(location);

        collapsingToolbarLayout.setTitle(name);

        RequestOptions requestOptions = new RequestOptions().centerCrop().placeholder(R.drawable.loading_shape).error(R.drawable.loading_shape);

        //set image using Glide

        Glide.with(this).load(image_url).apply(requestOptions).into(img);
    }

//    @Override
//    public void onClick(View view) {
//        Intent intent = new Intent("com.bitp3453.babysitter.activities.Booking");
//        intent.putExtra("nursery", "name");
//        startActivity(intent);
//    }

}
