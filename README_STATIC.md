# Shopping Website (Static/Inaccessible Version)
## Authors: Shuhan Han, Maha Fouda, Nnamdi Echegini, David Currey & Michaël Boisvenu-Landry

Build a fully static website that can be hosted for free on GitHub Pages. Site must contain a poorly accessible design in accordance to WCAGG. Backend-like functionality exists but is limited to the instance of the site running and is refreshed on a cache-clear, new tab, or hard refresh (i.e data stored on the site is not persistent between sessions although in some instances it may be).

### Features
- User registration
- User login
- Cart system
- Products divided by product category that can be added to the cart
- Products stored within project directory as JSON
- Editing of user profile
- Form validations
- Search functionality

### Accessibility Discrepencies
The site features the following poor accessibility designs:

#### Non-semantic HTML
Most elements are nested within `<div>`s and opt to not use appropriate semantic HTML counterparts. An example, the menu is nested in a `<div>` instead of a `<nav>` element.

#### Lack of <meta> tags
This site does not have appropriate `<meta>` tags for proper accessibility.

#### Generic <title> tag
Site uses same `<title>` tag throughout, leading to poor identification of web pages.

#### Bad colour contrast
Some components of the sate feature poor colour contrast

#### Generic colour usage
Some aspects of the site use poor colour choice. Examples are delete buttons being the same colour as text and other buttons, and validation messages being green instead of red.

#### No aria
The site does not use HTML aria properties at all.

#### No alt text on images
Some images do not use the HTML property 'alt'.

#### Lack of forms
The site contains `<form>` elements but the buttons will often be  `<p>` or `<a>` tags with an event listener attached to it via JavaScript.

### Structure
This site has a pretty linear structure compared to the Server Version. Most HTML pages can be found in the root directory, and product pages can be found in the /products directory. The /js directory hosts the main JavaScript file (indexnew.js) as well as a locally hosted jQuery file. Likewise all the CSS used in the site can be found in the /css directory as index.css. Images used in the site are all located in the /image directory.

This site emulates back-end functionallity by primarily using `localStorage` feature of the browser and JavaScript, all functions can be found in indexnew.js.

### HTML
The following are the HTML pages present in the site. All CSS and JS necessary for a page were created by the page's respective authors.

#### boilerplate.html
##### Author: Michael Boisvenu-Landry, Shuhan Han
Boilerplate HTML to create other pages from.

#### cart.html
##### Author: Michael Boisvenu-Landry
Page used to display cart data in a table, retrieved from localStorage.

### index.html
#### Author: Shuhan Han
Landing page of the site.

### login.html
#### Author: Maha Fouda
Page containing user login form.

### product.html
#### Author: Shuhan Han, Michael Boisvenu-Landry
Product page populated with data stored in localStorage from selected product.

### profile.html
#### Author: Nnamdi Echegini
User's profile page. Contains forms for modifying user data as well as uploading a profile picture.

### all.html, cookies.html, soups.html, drinks.html
#### Author: Shuhan Han, Michael Boisvenu-Landry
Product pages to display products on, each page will load the respective category of products except all.html which will load all products in indexnew.js. Can be found in the products directory.

### results.html
#### Author: David Currey
Page that displays search results. Can be found in the products directory.

## indexnew.js
Primary script for entire site, referenced on every page. Written by all team members. Different functions are run depending on the current page in view determined by the JS variable `window.location.href`. 

Which functions are run is determined in the jQuery main method `$(function() {...})` which is run on every single page. Dependant on which page is in view, the script may interact with localStorage by either parsing JSON stored into it, or converting JS object to JSON to store into it. If anything retrieved from localStorage is null, the script then creates it in storage with empty/default values.

Much of the HTML is created in these functions. An example would be displaying products on a product category page. For each product of that category, the script will create an HTML element representing its data. All the products can be found in JSON objects near the bottom of the script. It is necessary to load the JSON each time the script is loaded as we are working in a server-less environment and cannot bundle the JSON on a server.

All form validation is done in this script in their respective functions.
