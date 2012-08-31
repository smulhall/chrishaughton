package com.osgo.plugin.portfolio.servlet;

import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.osgo.plugin.portfolio.api.PortfolioService;
import com.osgo.plugin.portfolio.api.PortfolioServiceFactory;
import com.osgo.plugin.portfolio.model.objectify.Category;
import com.osgo.plugin.portfolio.model.objectify.Picture;
import com.osgo.plugin.portfolio.model.objectify.Project;

public class Update extends HttpServlet {
	
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
		Long projectID =null;
		Long imageID = null;
		Map<String, Object> input = null;
		try {
			projectID = Long.parseLong(request.getParameter("project_id"));
			imageID = Long.parseLong(request.getParameter("image_id"));
			input = request.getParameterMap();
		} catch (Exception e){
			return;
		}
		
		PortfolioService service = PortfolioServiceFactory.getPortfolioService();
		Project project = service.getProject(projectID);
		Picture picture = project.getImageById(imageID);
		
		picture.setAttributes(input);	
		service.update(picture);
	}
	
	public void doPut(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		
		
	}
	
}
