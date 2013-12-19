package com.osgo.plugin.portfolio.model.objectify;

import com.googlecode.objectify.Key;
import com.googlecode.objectify.Ref;
import com.googlecode.objectify.annotation.Entity;
import com.googlecode.objectify.annotation.Id;
import com.googlecode.objectify.annotation.Index;
import com.googlecode.objectify.annotation.Load;
import lombok.extern.java.Log;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import static com.googlecode.objectify.ObjectifyService.ofy;

@Log
@Entity
@Index
public class Category {

  @Id
  private Long id;
  private String title;
  @Load
  private List<Ref<Project>> projects = new ArrayList<>();
  private boolean featured = false;
  private boolean link = false;
  private Date date;

  public Long getId() {
    return id;
  }
  public void setId(Long id) {
    this.id = id;
  }
  public String getTitle() {
    return title;
  }
  public void setTitle(String title) {
    this.title = title;
  }

  public List<Project> getProjects(){
    log.info("Inside get Projetcs");
    log.info("Projects associated with Category: " + title + " are: " + projects.size());
    List<Project> results = new ArrayList<>(projects.size());
    for(Ref<Project> projectRef : projects){
      Project project = ofy().load().key(projectRef.getKey()).now();
      results.add(project); //TODO: fix this ya fecker!!!!
    }
    return results;
  }

  public List<Project> getProjectsOrder(){
    List<Project> results = ofy().load().type(Project.class).
        filter("category", Key.create(Category.class, this.getId())).order("-date").list();

    return results;
  }

  public void removeProject(Project project){
    Ref<Project> ref = Ref.create(Key.create(Project.class, project.getId()));
    projects.remove(ref);
  }

  public void setProjects(List<Project> list){
    for(Project project : list){
      projects.add(Ref.create(Key.create(Project.class, project.getId())));
    }
  }

  public void addProject(Project project){
    Ref<Project> ref = Ref.create(Key.create(Project.class, project.getId()));
    projects.add(ref);
  }
  public boolean isFeatured() {
    return featured;
  }
  public void setFeatured(boolean featured) {
    this.featured = featured;
  }
  public boolean isLink() {
    return link;
  }
  public void setLink(boolean link) {
    this.link = link;
  }
  public Date getDate() {
    return date;
  }
  public void setDate(Date date) {
    this.date = date;
  }
}
