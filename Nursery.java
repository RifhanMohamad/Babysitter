package com.bitp3453.babysitter.model;

public class Nursery {

    private String name;
    private String descriptions;
    private String ratings;
    private String categories;
    private String location;
    private String image_url;

    public Nursery() {
    }

    public Nursery(String name, String descriptions, String ratings, String categories, String location, String image_url) {
        this.name = name;
        this.descriptions = descriptions;
        this.ratings = ratings;
        this.categories = categories;
        this.location = location;
        this.image_url = image_url;
    }

    public String getName() {
        return name;
    }

    public String getDescriptions() {
        return descriptions;
    }

    public String getRatings() {
        return ratings;
    }

    public String getCategories() {
        return categories;
    }

    public String getLocation() {
        return location;
    }

    public String getImage_url() {
        return image_url;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setDescriptions(String descriptions) {
        this.descriptions = descriptions;
    }

    public void setRatings(String ratings) {
        this.ratings = ratings;
    }

    public void setCategories(String categories) {
        this.categories = categories;
    }

    public void setLocation(String location) {
        this.location = location;
    }

    public void setImage_url(String image_url) {
        this.image_url = image_url;
    }
}
