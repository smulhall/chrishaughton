package com.osgo.plugin.portfolio.servlet;

import java.io.IOException;
import java.io.InputStream;
import java.io.StringWriter;
import java.net.URLDecoder;
import java.nio.ByteBuffer;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Map.Entry;
import java.util.logging.Logger;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.fileupload.FileItemIterator;
import org.apache.commons.fileupload.FileItemStream;
import org.apache.commons.fileupload.FileUploadException;
import org.apache.commons.fileupload.servlet.ServletFileUpload;
import org.apache.commons.io.IOUtils;

import com.google.appengine.api.blobstore.BlobKey;
import com.google.appengine.api.blobstore.BlobstoreService;
import com.google.appengine.api.blobstore.BlobstoreServiceFactory;
import com.google.appengine.api.files.AppEngineFile;
import com.google.appengine.api.files.FileService;
import com.google.appengine.api.files.FileServiceFactory;
import com.google.appengine.api.files.FileWriteChannel;
import com.osgo.plugin.portfolio.api.PortfolioService;
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;
import com.osgo.plugin.portfolio.model.objectify.Category;
import com.osgo.plugin.portfolio.model.objectify.Picture;
import com.osgo.plugin.portfolio.model.objectify.Project;

public class UpdateImage extends HttpServlet {
	
	private static final Logger log =
		      Logger.getLogger(UpdateImage.class.getName());
	
	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		
		Map<String, Object> input = new HashMap<String, Object>();
		input.put("title", "category1");
		
		PortfolioService service = PortfolioServiceFactory.getPortfolioService();
		Category category = service.addCategory(input);
		
		response.getWriter().write(category.getTitle());
	}
	
	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		
		
		ServletFileUpload upload = new ServletFileUpload();		
		FileItemIterator iterator = null;
		try {
			iterator = upload.getItemIterator(request);
		} catch (FileUploadException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		// TODO: add code to work if no file was uploaded, should just be a normal parameter get
		if(iterator!=null){
			fileIncluded(iterator, request, response);
		} else {
			noFile(request, response);
		}
		
		response.sendRedirect("/forms/admin.php");
	}
	
	private void noFile(HttpServletRequest request, HttpServletResponse response) {
		PortfolioService portfolioService = PortfolioServiceFactory.getPortfolioService();
        Project project = null;
        Picture picture = null;
        Category category = null;
        List<String> info = new ArrayList<String>();
        List<String> links = new ArrayList<String>();
        List<String> linkTexts = new ArrayList<String>();
        
        String proj = request.getParameter("project_id");
        String cat = request.getParameter("category_id");
        String image = request.getParameter("image_id");
        
        category = portfolioService.getCategory(Long.parseLong(cat));
        project = portfolioService.getProject(Long.parseLong(proj));
        picture = project.getImageById(Long.parseLong(image));
        
		Map<String, Object> map = request.getParameterMap();
		for(Entry<String, Object> entry : map.entrySet()){
			String key = entry.getKey();
			log.warning("Key is: "+key);			
			String[] valueArr = (String[]) entry.getValue();
			String value = valueArr[0];
			log.warning("Value is: "+value);
			if(key.equals("project_id")){
				log.warning("Project id is: "+value);
		    } else if(key.equals("category_id")){			    	
			    log.warning("Category id is: "+value);
		    } else if(key.equals("image_id")){			    	
			    log.warning("Image id is: "+value);
		    } else {
		    	if(key.contains("display_text")){
		    		info.add(value);
		    	} else if(key.contains("link_url")){
		    		links.add(value);
		    	} else if(key.contains("link_text")){
		    		linkTexts.add(value);
		    	}
		    }
		}
		
		picture.setInfo(info);
		picture.setLinks(links);
		picture.setLinksText(linkTexts);
		portfolioService.update(picture);
		
	}

	private void fileIncluded(FileItemIterator iterator, HttpServletRequest request, HttpServletResponse response) throws NumberFormatException, IOException{
		BlobstoreService blobService = BlobstoreServiceFactory.getBlobstoreService();
		PortfolioService portfolioService = PortfolioServiceFactory.getPortfolioService();
        Project project = null;
        Picture picture = null;
        Category category = null;
        List<String> info = new ArrayList<String>();
        List<String> links = new ArrayList<String>();
        List<String> linkTexts = new ArrayList<String>();
        Map<String, BlobKey> images = new HashMap<String, BlobKey>();
		
		try {
		        	
        	// get Project to add image to

			while (iterator.hasNext()) {
			  FileItemStream item = iterator.next();
			  InputStream stream = item.openStream();

			  if (item.isFormField()) {
			    log.warning("Got a form field: " + item.getFieldName());
			    StringWriter writer = new StringWriter();
			    IOUtils.copy(stream, writer);
		    	String theString = writer.toString();
			    if(item.getFieldName().equals("project_id")){			    	
				    String projId = URLDecoder.decode(theString);
				    Long id = Long.parseLong(projId);
				    project = portfolioService.getProject(id);
			    } else if(item.getFieldName().equals("category_id")){			    	
				    String catId = URLDecoder.decode(theString);
				    Long id = Long.parseLong(catId);
				    category = portfolioService.getCategory(id);
			    } else if(item.getFieldName().equals("image_id")){			    	
				    String strId = URLDecoder.decode(theString);
				    Long id = Long.parseLong(strId);
				    picture = project.getImageById(id);
			    } else {
			    	if(item.getFieldName().contains("display_text")){
			    		info.add(theString);
			    	} else if(item.getFieldName().contains("link_url")){
			    		links.add(theString);
			    	} else if(item.getFieldName().contains("link_text")){
			    		linkTexts.add(theString);
			    	}
			    }
			  } else {
				  if(project==null){
					  response.getWriter().println("Error: Project not saved in DB.");
					  response.setStatus(500);
				  } else {
				    log.warning("Got an uploaded file: " + item.getFieldName() +
				                ", name = " + item.getName());
				    
				    byte[] data = IOUtils.toByteArray(item.openStream());
				    if(data.length>0){
					    BlobKey blobKey = createBlob(data, response);
					    images.put(item.getFieldName(), blobKey);
			  		}					
				  }
			  }
			}
		} catch (IllegalStateException e) {
			response.getWriter().println("Error: Occurred during upload: "+e.getMessage());
			response.setStatus(500);
		} catch (FileUploadException e) {
			response.getWriter().println("Error: Occurred during upload: "+e.getMessage());
			response.setStatus(500);
		}	

		BlobKey imageKey = images.get("main");
		if(imageKey!=null){
			BlobKey oldImage = picture.getKey();
			blobService.delete(oldImage);
			picture.setKey(imageKey);
		}
		BlobKey thumbKey = images.get("thumb");
		if(thumbKey!=null && picture!=null){
			BlobKey oldImage = picture.getThumbKey();
			blobService.delete(oldImage);
			picture.setThumbKey(thumbKey);
		}
		if(picture!=null){
			picture.intUrl();
			picture.setInfo(info);
			picture.setLinks(links);
			picture.setLinksText(linkTexts);
			picture.setDate(Calendar.getInstance().getTime());
			portfolioService.update(picture);
		}
	}
	
	private BlobKey createBlob(byte[] data, HttpServletResponse response) throws IOException{
		  // Get a file service
		  FileService fileService = FileServiceFactory.getFileService();

		  // Create a new Blob file with mime-type "text/plain"
		  AppEngineFile file = fileService.createNewBlobFile("image/jpeg");

		  // Open a channel to write to it
		  boolean lock = true;
		  FileWriteChannel writeChannel = fileService.openWriteChannel(file, lock);
		  String path = file.getFullPath();

		  // Write more to the file in a separate request:
		  file = new AppEngineFile(path);

		  // This time we write to the channel directly
		  writeChannel.write(ByteBuffer.wrap(data));

		  // Now finalize
		  writeChannel.closeFinally();

		  // Now read from the file using the Blobstore API
		  BlobKey blobKey = fileService.getBlobKey(file);
		  
		  return blobKey;

	}
	
}
