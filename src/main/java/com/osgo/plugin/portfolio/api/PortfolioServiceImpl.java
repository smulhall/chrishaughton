package com.osgo.plugin.portfolio.api;

import com.googlecode.objectify.Key;
import com.googlecode.objectify.VoidWork;
import com.googlecode.objectify.Work;
import com.osgo.plugin.portfolio.model.objectify.Category;
import com.osgo.plugin.portfolio.model.objectify.Picture;
import com.osgo.plugin.portfolio.model.objectify.Project;
import lombok.extern.java.Log;

import java.util.Calendar;
import java.util.List;
import java.util.Map;

import static com.googlecode.objectify.ObjectifyService.ofy;

@Log
public class PortfolioServiceImpl implements PortfolioService {


	@Override
	public List<Project> getProjectList() {
		
		List<Project> results = ofy().load().type(Project.class).order("-date").list();
		return results;
	}

	@Override
	public Project getProject(long id) {
		Project result = ofy().load().key(Key.create(Project.class, id)).now();
		return result;
	}

	@Override
	public void deleteProject(final long id) {
		ofy().transactNew(new VoidWork() {
		    public void vrun() {
		    	Project project = ofy().load().key(Key.create(Project.class, id)).now();
		    	Category category = ofy().load().key(project.getCategory()).now();
		    	category.removeProject(project);
		    	ofy().delete().key(Key.create(Project.class, id));
		    	ofy().save().entity(category);
		    }
		});
	}
	
	public Project addProject(final Project project, Category category) {
		project.setDate(Calendar.getInstance().getTime());
		Project result = ofy().transactNew(new Work<Project>(){
			@Override
			public Project run() {
				Project result = (Project) ofy().save().entity(project);
				return result;		
			}		
		});
		return result;
	}
	
	@Override
	public Project updateProject(final Project project) {
		Project result = ofy().transactNew(new Work<Project>(){
			@Override
			public Project run() {
				Key<Project> key = ofy().save().entity(project).now();
				Project proj = ofy().load().key(key).now();
				return proj;
			}		
		});
		return result;
	}

	@Override
	public Project addProject(final Map<String, Object> input) {
		
		final Category category;
		String idStr = (String) input.get("category");
		if(idStr!=null){
			category = ofy().load().key(Key.create(Category.class, Long.parseLong(idStr))).now();
		} else {
			category = null;
		}
		
		Project result = ofy().transactNew(new Work<Project>(){
			@SuppressWarnings("unchecked")
			@Override
			public Project run() {
				String title = (String) input.get("title");
				String text = (String) input.get("text");
				Project project = new Project();
				project.setDate(Calendar.getInstance().getTime());
				if(category!=null){
					project.setCategory((Key.create(Category.class, category.getId())));
				}
				project.setTitle(title);
				project.setText(text);
				Key<Project> result = ofy().save().entity(project).now();
				project = ofy().load().key(result).now();
				
				if(category!=null){
					category.addProject(project);
					ofy().save().entities(category).now();
				}
				
				return project;		
			}		
		});
		return result;
	}
	
	@Override
	public void addImage(final Picture image, final Project project) {
		
		ofy().transactNew(new VoidWork(){
			@Override
			public void vrun() {
				// adds image to DB
				Key<Picture> result = (Key<Picture>) ofy().save().entity(image).now();
				// returns newly created image
				Picture picture = (Picture) ofy().load().key(result).now();
				// returns relevent project
				Project proj = ofy().load().key(Key.create(Project.class, project.getId())).now();
				// adds image to project
				proj.addImage(picture);
				// updates project in DB
				ofy().save().entity(proj).now();
			}		
		});
		
	}
	
	@Override
	public void deleteImage(final long id, final long projectId) {
		ofy().transactNew(new VoidWork(){
			@Override
			public void vrun() {
				Picture image = ofy().load().key(Key.create(Picture.class, id)).now();
				Project project = ofy().load().key(Key.create(Project.class, projectId)).now();
				project.removeImage(image);
				ofy().save().entity(project);				
				// removes image from db
				ofy().delete().entity(image);
			}		
		});	
	}

	@Override
	public List<Category> getCategoryList() {
    log.info("Inside getCategoryList");
		List<Category> results = ofy().load().type(Category.class).order("-date").list();
    log.info("returning: " + results.size());
		return results;
	}

	@Override
	public Category getCategory(long id) {
		return ofy().load().key(Key.create(Category.class, id)).now();
	}

	@Override
	public void deleteCategory(final long id) {
		ofy().transactNew(new VoidWork() {
		    public void vrun() {
		    	Category category = ofy().load().key(Key.create(Category.class, id)).now();
		    	
		    	List<Project> projects = category.getProjects();
		    	for(Project p : projects){
		    		List<Picture> images = p.getImages();
		    		for(Picture pic : images){
		    			ofy().delete().entity(pic);
		    		}
		    		ofy().delete().entity(p);
		    	}
		    	ofy().delete().entity(category);
		    }
		});
		
	}

	@Override
	public Category addCategory(final Map<String, Object> input) {
		Category result = ofy().transactNew(new Work<Category>(){
			@SuppressWarnings("unchecked")
			@Override
			public Category run() {
				String title = (String) input.get("title");
				String featured = (String)input.get("featured");
				String link = (String)input.get("link");
				boolean featuredVal = false;
				if(featured.equals("true")){
					if(featured.equals("true"));
						featuredVal = true;
				}
				boolean linkVal = false;
				if(link.equals("true")){
					if(link.equals("true"));
						linkVal = true;
				}
				Category category = new Category();
				category.setDate(Calendar.getInstance().getTime());
				category.setTitle(title);
				category.setFeatured(featuredVal);
				category.setLink(linkVal);
				Key<Category> result = ofy().save().entity(category).now();
				Category obj = ofy().load().key(result).now();
				return obj;		
			}		
		});
		return result;
	}

	@Override
	public Category updateCategory(Category category) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public Object update(final Object entity) {
		Object result = ofy().transactNew(new Work<Object>(){
			@Override
			public Object run() {
				Key<Object> key = ofy().save().entity(entity).now();
				Object proj = ofy().load().key(key).now();
				return proj;
			}		
		});
		return result;
	}
	
	@Override
	public void delete(final Object entity) {
		ofy().transactNew(new VoidWork() {
		    public void vrun() {
		    	ofy().delete().entity(entity);
		    }
		});
	}

	
		
}
