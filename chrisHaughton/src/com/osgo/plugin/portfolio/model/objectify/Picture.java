package com.osgo.plugin.portfolio.model.objectify;

import com.google.appengine.api.blobstore.BlobKey;
import com.google.appengine.api.blobstore.BlobstoreService;
import com.google.appengine.api.blobstore.BlobstoreServiceFactory;
import com.google.appengine.api.images.Image;
import com.google.appengine.api.images.ImagesService;
import com.google.appengine.api.images.ImagesServiceFactory;
import com.google.appengine.api.images.ServingUrlOptions;
import com.googlecode.objectify.Key;
import com.googlecode.objectify.annotation.Entity;
import com.googlecode.objectify.annotation.Id;

@Entity
public class Picture {

	@Id
	private Long id;
	private String name;
	private BlobKey key;
	private String url;
	private String thumbUrl;
	private String alt;
	
	private Key<Project> project;
	
	public Long getId() {
		return id;
	}
	public void setId(Long id) {
		this.id = id;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public BlobKey getKey() {
		return key;
	}
	public void setKey(BlobKey key) {
		this.key = key;
	}
	public String getUrl() {
		return url;
	}
	public void setUrl(String url) {
		this.url = url;
	}
	
	public void intUrl(){
		BlobstoreService service = BlobstoreServiceFactory.getBlobstoreService();
		ImagesService imagesService = ImagesServiceFactory.getImagesService();

		this.url = imagesService.getServingUrl(ServingUrlOptions.Builder.withBlobKey(this.getKey()));
		//this.thumbUrl = imagesService.getServingUrl(ServingUrlOptions.Builder.withBlobKey(this.getKey()).imageSize(1));
	}
	
	public String getThumb(){

		return this.thumbUrl;
	}
	
	public String getAlt() {
		return alt;
	}
	public void setAlt(String alt) {
		this.alt = alt;
	}
	public Key<Project> getProject() {
		return project;
	}
	public void setProject(Key<Project> project) {
		this.project = project;
	}
	
	
}
