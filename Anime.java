package com.bitp3453.babysitter.model;

public class Anime {
    private String name;
    private String descriptions;
    private String ratings;
    private int nb_episodes;
    private String categories;
    private String studio;
    private String image_url;

    public Anime() {
    }

    public Anime(String name, String descriptions, String ratings, int nb_episodes, String categories, String studio, String image_url) {
        this.name = name;
        this.descriptions = descriptions;
        this.ratings = ratings;
        this.nb_episodes = nb_episodes;
        this.categories = categories;
        this.studio = studio;
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

    public int getNb_episodes() {
        return nb_episodes;
    }

    public String getCategories() {
        return categories;
    }

    public String getStudio() {
        return studio;
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

    public void setNb_episodes(int nb_episodes) {
        this.nb_episodes = nb_episodes;
    }

    public void setCategories(String categories) {
        this.categories = categories;
    }

    public void setStudio(String studio) {
        this.studio = studio;
    }

    public void setImage_url(String image_url) {
        this.image_url = image_url;
    }
}


