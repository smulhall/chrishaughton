package com.osgo.plugin.portfolio.model.objectify;

import java.lang.reflect.Constructor;
import java.lang.reflect.Field;
import java.lang.reflect.InvocationTargetException;
import java.util.Date;
import java.util.List;
import java.util.Map;

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
import com.googlecode.objectify.annotation.Index;

@Entity
@Index
public class Picture {

	@Id
	private Long id;
	private String name;
	private BlobKey key;
	private String url;
	private String thumbUrl;
	private BlobKey thumbKey;
	private String alt;
	private String movieUrl;
	private List<String> info;
	private List<String> links;
	private List<String> linksText;
	private Date date;
	
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
		ImagesService imagesService = ImagesServiceFactory.getImagesService();
		
		if(this.getKey() != null){
			this.url = imagesService.getServingUrl(ServingUrlOptions.Builder.withBlobKey(this.getKey()));
		}
		if(this.getThumbKey() != null){
			this.setThumbUrl(imagesService.getServingUrl(ServingUrlOptions.Builder.withBlobKey(this.getThumbKey())));
		}
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
	public List<String> getInfo() {
		return info;
	}
	public void setInfo(List<String> info) {
		this.info = info;
	}
	public List<String> getLinks() {
		return links;
	}
	public void setLinks(List<String> links) {
		this.links = links;
	}
	public BlobKey getThumbKey() {
		return thumbKey;
	}
	public void setThumbKey(BlobKey thumbKey) {
		this.thumbKey = thumbKey;
	}
	public String getThumbUrl() {
		return thumbUrl;
	}
	public void setThumbUrl(String thumbUrl) {
		this.thumbUrl = thumbUrl;
	}
	public String getMovieUrl(){
		return this.movieUrl;
	}
	
	public void setAttributes(Map<String, Object> input){
		Key<Category> key = null;
		
		for (Field f : getClass().getDeclaredFields()) {
			String attrName = f.getName();
			Object obj = (Object) input.get(attrName);
			String category = (String) input.get("category");
			if(category!=null){
				obj = Key.create(Category.class, 1);
			}
			if(obj!=null){
				Object objToSet = null;
				try {
					Class<?> type = f.getType();
					Constructor<?>[] ctors = type.getDeclaredConstructors();
					Constructor<?> ctor = null;
					for (int i = 0; i < ctors.length; i++) {
					    ctor = ctors[i];
					    if (ctor.getGenericParameterTypes().length == 1){
					    	Class<?>[] params = ctor.getParameterTypes();
					    	if(params[0].getSimpleName().equals("String")){
					    		try {
					    			objToSet = ctor.newInstance(obj);
					    		} catch (InvocationTargetException e) {
									// using 0 instead of "" for empty numbers
									objToSet = ctor.newInstance(0);
								}
					    		break;
					    	}
					    }				
					}
					f.set(this, objToSet);
				} catch (IllegalArgumentException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} catch (IllegalAccessException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} catch (InstantiationException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}  catch (InvocationTargetException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
		}
	}
	public void setMovieUrl(String movieUrl) {
		this.movieUrl = movieUrl;
	}
	public List<String> getLinksText() {
		return linksText;
	}
	public void setLinksText(List<String> linksText) {
		this.linksText = linksText;
	}
	public Date getDate() {
		return date;
	}
	public void setDate(Date date) {
		this.date = date;
	}
	
}
