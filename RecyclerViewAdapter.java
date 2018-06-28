package com.bitp3453.babysitter.adapters;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.bitp3453.babysitter.activities.NurseryActivity;
import com.bitp3453.babysitter.model.Anime;
import com.bitp3453.babysitter.R ;
import com.bitp3453.babysitter.model.Nursery;
import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;

import java.util.List;

public class RecyclerViewAdapter extends RecyclerView.Adapter<RecyclerViewAdapter.MyViewHolder> {


    private Context mContext;
    private List<Nursery> mData;
    RequestOptions option;

    public RecyclerViewAdapter(Context mContext, List<Nursery> mData) {
        this.mContext = mContext;
        this.mData = mData;

        //Request option for Glide
        option = new RequestOptions().centerCrop().placeholder(R.drawable.loading_shape).error(R.drawable.loading_shape);
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {

        View view;
        LayoutInflater inflater =  LayoutInflater.from(mContext);
        view = inflater.inflate(R.layout.nursery_row_item,parent,false);
        final MyViewHolder viewHolder = new MyViewHolder(view);
        viewHolder.view_container.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(mContext, NurseryActivity.class);
                i.putExtra("nursery_name",mData.get(viewHolder.getAdapterPosition()).getName());
                i.putExtra("nursery_description",mData.get(viewHolder.getAdapterPosition()).getDescriptions());
                i.putExtra("nursery_location",mData.get(viewHolder.getAdapterPosition()).getLocation());
                i.putExtra("nursery_category",mData.get(viewHolder.getAdapterPosition()).getCategories());
                i.putExtra("nursery_rating",mData.get(viewHolder.getAdapterPosition()).getRatings());
                i.putExtra("nursery_img",mData.get(viewHolder.getAdapterPosition()).getImage_url());

                mContext.startActivity(i);
            }
        });

        return viewHolder;
    }

    @Override
    public void onBindViewHolder(MyViewHolder holder, int position) {

        holder.tv_name.setText(mData.get(position).getName());
        holder.tv_rating.setText(mData.get(position).getRatings());
        holder.tv_location.setText(mData.get(position).getLocation());
        holder.tv_category.setText(mData.get(position).getCategories());

        //Load Image from the internet and set it into ImageView using Glide

        Glide.with(mContext).load(mData.get(position).getImage_url()).apply(option).into (holder.img_thumbnail);

    }

    @Override
    public int getItemCount() {
        return mData.size();
    }

    public static class  MyViewHolder extends RecyclerView.ViewHolder {

        TextView tv_name;
        TextView tv_rating;
        TextView tv_location;
        TextView tv_category;
        ImageView img_thumbnail;
        LinearLayout view_container;


        public MyViewHolder(View itemView) {
            super(itemView);

            view_container = itemView.findViewById(R.id.container);
            tv_name = itemView.findViewById(R.id.nursery_name);
            tv_category = itemView.findViewById(R.id.categories);
            tv_rating = itemView.findViewById(R.id.rating);
            tv_location = itemView.findViewById(R.id.location);
            img_thumbnail = itemView.findViewById(R.id.thumbnail);

        }


    }
}
