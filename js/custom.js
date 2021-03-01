d=document;w=window;c=console;


w.onload=()=>{
  // LAZY LOAD FUNCTIONS MODULE
  var lBs=[].slice.call(d.querySelectorAll(".lazy-background")),lIs=[].slice.call(d.querySelectorAll(".lazy")),opt={threshold:.01};
  if("IntersectionObserver" in window){
    let lBO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.add("visible");lBO.unobserve(l)}})},opt),
        lIO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.remove("lazy");lIO.unobserve(l);l.srcset=l.dataset.url}})},opt);
    lIs.forEach(lI=>{lIO.observe(lI)});lBs.forEach(lB=>{lBO.observe(lB)});
  }

  // Modules setup
	growUpController.setup()
	obseController.setup()
  carouselController.setup();
  startMateput();
  d.getElementById("load").style.top="-100vh";


  if (readCookie('theme') == 'dark') {
    theme.select('dark')
  }
}

// window.CSS.registerProperty({
//   name: '--logo_size',
//   syntax: '<length>',
//   inherits: false,
//   initialValue: '20px',
// });
// window.CSS.registerProperty({
//   name: '--brand_color_1',
//   syntax: '<color>',
//   inherits: false,
//   initialValue: '#000F41',
// });





const my_share = (title, text, url) => {
  if (navigator.share) {
    navigator.share({
        title: title,
        text: text,
        url: url,
      })
      .then(() => console.log('Successful share'))
      .catch((error) => console.log('Error sharing', error));
  } else {
    console.log('Share not supported on this browser, do it the old way.');
  }
}

const simpla_car_my_share = (id, title, text, url)=>{
  // console.log('data: ', id, title, text, url);
  if( navigator.share ){
    my_share(title, text, url);
  } else{
    altClassFromSelector('visible', '.post-'+id+' .social_sharing_container')
  }
}







// redirect to search page on the redirecter "enter" key press
w.addEventListener('keydown', event =>{
	// enter takes you to search page when you press it in the searchbox
	if (event.keyCode == 13 && !event.shiftKey) {
    if(document.activeElement == document.querySelector('.Redirecter')){
      let keyword = document.activeElement.value;
      window.location.href = lt_data.homeurl + `/search?filters={"search":"${keyword}"}`;
    }
    event.preventDefault();
  }
})






async function ajax2(formData, url = lt_data.ajaxurl) {
	try{
		let response = await fetch(url, { method: 'POST', body: formData, });
		return await response.json();
	} catch ( err ) { console.error(err); }
}

async function ajax3(formData, url = lt_data.ajaxurl) {
	try{
		let response = await fetch(url, { method: 'POST', body: formData, });
		return await response.text();
	} catch ( err ) { console.error(err); }
}








/*
=altClassFromSelector

alternates a class from a selector of choice, for example:
<div class="someButton" onclick="altClassFromSelector('activ', '#navBar')"></div>
*/
const altClassFromSelector = ( clase, selector, dont_remove = false )=>{
  const elementos = [...d.querySelectorAll(selector)];
  elementos.forEach(elemento => {
    // const x = d.querySelector(selector);
    // if there is a main class removes all other classes
    if(dont_remove){
      elemento.classList.forEach( item =>{
        if( dont_remove.findIndex( element => element == item) == -1 && item!=clase ){
          elemento.classList.remove(item);
        }
      });
    }

    if(elemento.classList.contains(clase)){
      if(dont_remove){
        if( dont_remove.findIndex( element => element == clase) == -1 ){
          elemento.classList.remove(clase)
        }
      } else {
        elemento.classList.remove(clase)
      }
    }else{
      if(clase){
        elemento.classList.add(clase)
      }
    }
  })
}











// GO BACK BUTTONS
function goBack(){w.history.back()}














//Accordion //Desplegable
var acc = d.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click",()=>{
    this.classList.toggle("active");
    // TODO: Hacer que se puede elegir el elemento a acordionar
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
      panel.style.padding = "0";
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
      panel.style.padding = "20px";
    }
  });
}













function strip(html){
   let doc = new DOMParser().parseFromString(html, 'text/html');
   return doc.body.textContent || "";
}

const reading_time = (content) => {
  let word_count = strip(content).split(' ').length;
  let words_per_minute = 200;
  let readingTime = Math.ceil(word_count / words_per_minute)
  return readingTime
}


// element class
// se crea el elemento dandole de comer "elementValues", que es un objecto
class Simpla_post {
	constructor(post){
		// Esta parte define las propiedades del elemento como vienen del objeto v
		for(let property in post){Object.defineProperty(this,property,{enumerable:true,value:post[property]})}
	}
	print_UI( parent_query, index ){
		// Test to see if the browser supports the HTML template element by checking
		// for the presence of the template element's content attribute.
		if ('content' in d.createElement('template')) {

			// Instantiate the template
			// and the nodes you will control
			let draw     = d.importNode(d.querySelector("#simpla").content, true),
      simpla       = draw.querySelector(".simpla"),
			author_name  = draw.querySelector(".simpla_author_name"),
      title        = draw.querySelector(".simpla_title"),
      categories   = draw.querySelector(".simpla_cat"),
      image        = draw.querySelector(".simpla_img"),
      r_time       = draw.querySelector(".simpla_reading_time"),
      date         = draw.querySelector(".simpla_date");



      let the_date = new Date(this.date)

      let day = the_date.getDate()
      let month = the_date.getMonth() + 1
      let year = the_date.getFullYear()

      // console.log(this.uagb_featured_image_src.full);

      // Make your changes
      // console.log(this.title.rendered);
      if(this.sticky == true){
        simpla.classList.add('featured')
      }
      title.innerHTML = this.title.rendered;
			title.setAttribute('href', this.link);
      // image.setAttribute('src', this.uagb_featured_image_src.full[0])
      date.textContent = `${day}/${month}/${year}`;
      r_time.innerText = reading_time(this.content.rendered);

      // let cates = '';
      // this.categories_data.forEach((item, i) => {
      //   cates += `<a href="${item.link}">${item.name}</a>`
      // });
      // categories.innerHTML = cates;


      // author_name.innerHTML = this.uagb_author_info.display_name;

			// Insert it into the document in the right place
			let parent = d.querySelector( parent_query );
			parent.insertBefore(draw, parent.children[ index ]);
		}
		else { // Find another way to add the rows to the table because the HTML template element is not supported.
      // TODO: mejorar este mensaje
			c.log("ERROR: your browser does not support required features for this website");
		}
	}
}


const ticon_load = async (id) =>{
  let parent = '.Culiau',
  per_page = 10;

  let end_point = "http://localhost/wepol/wp-json/wp/v2/posts?categories="+id+'&per_page='+per_page+'&sticky=1'
  // let end_point = "https://rollingstones.com/wp-json/wp/v2/posts?per_page="+per_page
  let response = await fetch(end_point);
  let data     = await response.json( );
  c.log(data);

  data.forEach( post => {
    // if (post.id != featured_id) {
      simpla = new Simpla_post(post);
      simpla.print_UI(parent, 0);
      // c.log(simpla);
    // }
  });
}

// ticon_load()











const test_ticon_category = async (id)=>{
  let parent = '.ticon-'+id+' .ticon_grid';

	let formData = new FormData();
  formData.append('action', 'ticon_category');
  console.log( id);
	formData.append('term_id', id);

  let end_point = lt_data.ajaxurl
  let response = await fetch(end_point, { method: 'POST', body: formData, });
  let data     = await response.text( );
  // console.log(data);
  d.querySelector(parent).innerHTML = data;
}


if( lt_data.is_front_page){
  let categories = JSON.parse(lt_data.categories)
  categories.forEach( async (category, i) => {
    test_ticon_category(category.term_id)
  });
}

// if(!lt_data.is_front_page){
//   const adjust_gliter_height = selector => {
//     let target_height = d.querySelector(selector).clientHeight
//     let gliter = d.querySelector('.two_one .gliter')
//     gliter.style.height = target_height + 'px'
//   }
//   adjust_gliter_height('.two_one .Height_measurement');
//   window.addEventListener('resize', _ => {
//     adjust_gliter_height('.two_one .Height_measurement');
//   });
// }




const change_view_count_name = async () => {
	let formData = new FormData();
  formData.append('action', 'change_view_count_name');

  let end_point = lt_data.ajaxurl
  let response = await fetch(end_point, { method: 'POST', body: formData, });
  let data     = await response.json( );
  console.log(data);
}
// change_view_count_name();




















function new_cookie(name,value,days){
  if(days){
    var date=new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires="; expires="+date.toUTCString();
  } else var expires="";
  d.cookie=name+"="+value+expires+"; path=/";
}
function readCookie  (n){var m=n+"=",a=d.cookie.split(';');for(var i=0;i<a.length;i++){var c=a[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(m)==0)return c.substring(m.length,c.length);}}
function delete_cookie (n){new_cookie(n,"",-1)}







const theme = {
  alternate:()=>{
    if (readCookie('theme') == 'dark') theme.select('light');
    else { theme.select('dark') }
  },
  select: (option)=>{
    if (option == 'dark') {
      document.querySelector('body').classList.add('dark_theme')
      if (readCookie('theme') != 'dark') {
        delete_cookie('theme');
        new_cookie('theme', 'dark', 1)
      }
    }
    if (option == 'light') {
      document.querySelector('body').classList.remove('dark_theme')
      if (readCookie('theme') != 'light') {
        delete_cookie('theme');
        new_cookie('theme', 'light', 1)
      }
    }
  }
}














const activate_paginators = (paginators)=>{
  paginators.forEach((item, i) => {
    item.onclick = (self)=>{
      let page = self.target.dataset.pagination;
      let cycle_container = self.target.parentElement.parentElement;
      fil_pa_sea(cycle_container, false, page, false)
    }
  });
}
const activate_filters = (filters)=>{
  filters.forEach((item, i) => {
    // c.log(item)
    let element = item;
    let keep_going = true;
    let cycle_name = '';
    let cycle_container;
    i=0;

    var button = item,
        parent = button.querySelector('input').dataset.parent,
        category = button.querySelector('input').dataset.slug,
        taxonomy = button.querySelector('input').dataset.taxonomy;

    while(keep_going){
      cycle_name = element.dataset.cycleContainer;
      if (cycle_name){
        cycle_container = d.querySelector('[data-cycle='+cycle_name+']')
        keep_going = false;
      } else if (element == d.querySelector('body')) {
        c.log(item)
        c.log('has configurado mal el filtro, debes poner \'data-cycle-container="name"\'')
        keep_going = false;
      } else {
        element = element.parentElement;
      }
      i++;
    }
    item.onchange = (self)=>{
      let filter = {
        taxonomy: taxonomy,
        parent: parent,
        terms: category,
      }
      fil_pa_sea(cycle_container, filter, false, false);
    }
  });
}

const activate_searchers = (searchers) =>{
  searchers.forEach( searcher => {
    let element = searcher;
    let cycle_container;
    let keep_going = true;


    // busca el nombre del cyclo escrito en algun padre
    while(keep_going){
      cycle_name = element.dataset.cycleContainer;
      if (cycle_name){
        cycle_container = d.querySelector('[data-cycle='+cycle_name+']')
        keep_going = false;
      } else if (element == d.querySelector('body')) {
        c.log('has configurado mal el filtro, debes poner \'data-cycle-container="name"\'')
        keep_going = false;
      } else {
        element = element.parentElement;
      }
      i++;
    }

    // c.log(cycle_container);

    var searchTimeOut;
    searcher.oninput = ()=>{
      clearTimeout(searchTimeOut);
      searchTimeOut = setTimeout(()=>{
        fil_pa_sea(cycle_container, false, false, searcher.value);
      }, 1200);
    }
  });
}

// This part activates the filters on change
filterers = [...document.querySelectorAll('[data-cycle-container] .selectBoxOption')]
if (filterers){ activate_filters(filterers) }

// This part activates the pagination on click
paginators = [...document.querySelectorAll('.pagination_link')]
if (paginators){ activate_paginators(paginators) }

// This part activates the search on write
searchers = [...document.querySelectorAll('.Searcher')]
if (searchers){ activate_searchers(searchers) }








//
// shareButton = d.querySelector('.log_title');
// shareButton.addEventListener('click', async () => {
//   try {
//     await navigator.share({ title: "Example Page", url: "" });
//     console.log("Data was shared successfully");
//   } catch (err) {
//     alert(err.message)
//     // console.error("Share failed:", err.message);
//   }
// });








// console.log(JSON.stringify({page:2,tax:[{taxonomy:'category',parent:'categorias',terms:'test'},]}))
// let test = {
//   tax:{
//     categorias:{taxonomy:'category',parent:'categorias',category:'test'},
//     otro:{pepe:'pepe',},
//   }
// }
// console.log('test',JSON.stringify(test))

// fil_pa_sea stands for "filter pagination search"
const fil_pa_sea = (cycle_container, filter, page, keyword)=>{
  let card  = cycle_container.dataset.card;
  let cycle = cycle_container.dataset.cycle ? cycle_container.dataset.cycle : 'filters';
  // c.log('saved query: ', window[cycle].query);
  let query = JSON.parse(window[cycle].query);
  query.category_name = '';
  query.cat = '';
  // console.log(query)


  // URL HANDLING
  let search = location.search.substring(1),
  params = new URLSearchParams(search),
  url_no_params = w.location.href.split('?')[0],
  url_params = '',
  args = params.get(cycle) ? JSON.parse(params.get(cycle)) : {};
  // c.log('args: ', args)


  // filters part
  // modelo: filters={page:2,tax:[{taxonomy:'category',parent:'categorias',terms:'test'},]}
  query.tax_query = {}
  query.tax_query['relation'] = 'AND';
  // TODO: que pasa si hay varios filtros en un mismo ciclo????
  if(!args.tax) args.tax = {}
  if(filter){
    if( filter.terms == '0' ){
      delete args.tax[filter.parent];
      // delete query.tax_query[filter.parent];
    } else {
      args.tax[filter.parent] = {
        terms:   filter.terms,
        taxonomy:filter.taxonomy,
        parent:  filter.parent,
      }
    }
  }
  if( !Object.keys(args.tax).length ) delete args.tax;
  // end of filters part

  // page part
  if ( !page ) page = query.paged ? query.paged : 1;
  let current = args.page ? args.page : 1;
  if ( page == 'next' ) { page = current + 1; }
  if ( page == 'prev' ) { page = current - 1; }
  args.page = page;
  if (page == 1) delete args.page;
  // end of page part


  // search part
  // c.log('keyword: ', keyword);
  if (keyword) args.search = keyword;
  if (keyword === '') delete args.search;
  if ( !args.search ) delete args.search;
  // end of search part

  if( !!Object.keys(args).length ){
    params.set(cycle, JSON.stringify(args))
    url_params = '?' + params.toString();
  } else {
    url_params = '';
  }
  w.history.replaceState('', 'Title', url_no_params + url_params);
  // END OF URL HANDLING


  // QUERY HANDLING
  query.paged = page;

  for (var item in args.tax) {
    if(args.tax[item].parent && args.tax[item].taxonomy && args.tax[item].terms){
      query.tax_query[args.tax[item].parent] = {
        'taxonomy' : args.tax[item].taxonomy,
        'field'    : 'slug',
        'terms'    : args.tax[item].terms,
      }
    }
  }

  query.s = keyword;

  query = JSON.stringify(query)
  window[cycle].query = query
  // c.log('query: ', query)
  // END OF QUERY HANDLING



  var formData = new FormData();
  formData.append( 'action', 'lt_pagination_2' );
  formData.append( 'query', query );
  // formData.append( 'page', page );
  formData.append( 'card', card );
  ajax3(formData).then( respuesta => {
    // console.log(respuesta)
    cycle_container.innerHTML = respuesta;

    // This part activates the pagination on click
    paginators = [...document.querySelectorAll('.pagination_link')]
    if (paginators){ activate_paginators(paginators); }
  });
}
