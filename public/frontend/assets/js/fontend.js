// show cart product when click cart icon
const cartIcon = document.getElementById('click-cart-icon'),
      cartContent = document.getElementById('cart-product-show')

      if(cartIcon){
        cartIcon.addEventListener('click', () => {
          cartContent.classList.toggle('active-cart-product')
        })
      }

// hide cart product when click cart icon
const closeBtn = document.getElementById('hideCartProduct');
if(closeBtn){
  closeBtn.addEventListener('click', () => {
          cartContent.classList.remove('active-cart-product')
        })
      }

// show cart profile dropdown when click cart icon mobile-profile-icon
const profileIcon = document.getElementById('profile-icon'),
     mobileProfileIcon = document.getElementById('mobile-profile-icon'),
      profileDropDown = document.getElementById('profile-drop-down')

      if(profileIcon){
        profileIcon.addEventListener('click', () => {
          profileDropDown.classList.toggle('active-profile-drop-down')
        })
      }
       if(mobileProfileIcon){
          mobileProfileIcon.addEventListener('click', () => {
          profileDropDown.classList.toggle('active-profile-drop-down')
        })
      }
     
// show search form dropdown when click cart icon      
const searchIcon = document.getElementById('search-icon')
      searchForm = document.getElementById('search-form')
      

      if(searchIcon){
        searchIcon.addEventListener('click', () => {
          searchForm.classList.toggle('active-search-form')
        })
      }
      
 const mobileSerchIcon = document.getElementById('mobile-serach-icon')
      mobileSearchForm = document.getElementById('mobile-serach-form')
      if(mobileSerchIcon){
          mobileSerchIcon.addEventListener('click', () => {
          mobileSearchForm.classList.toggle('active-search-form')
        })
      }


// show drop  menu when click cart icon      
const dropIcon = document.getElementById('click-drop-down'),
      dropPages = document.getElementById('show-pages-menus')
      iconRotate = document.getElementById('icon-rotate')

      if(dropIcon){
        dropIcon.addEventListener('click', () => {
            dropPages.classList.toggle('active-drop-pages')
            iconRotate.classList.toggle('active-icon-rotate')
        })
      }

// when click mega menu icon show mega menu content
    const megaMenuIcon = document.getElementById('click-mega-icon');
          megaContent  = document.getElementById('show-mega-content')
          megaIconRotate  = document.getElementById('megaIconRogate')
          activeMegaBorder  = document.getElementById('active-mega-menu-border')

          if(megaMenuIcon){
            megaMenuIcon.addEventListener('click', () => {
              megaContent.classList.toggle('active-mega-content')
              megaIconRogate.classList.toggle('active-mega-icon-rotate')
              activeMegaBorder.classList.toggle('active-mega-icon-border')
              
            })
            
          }

// when click mega menu icon show mega menu content


// show mobile menu when click mobile menu icon
const mobileMenuIcon = document.getElementById('click-moblile-menu-icon'),
      mobileMenuContent = document.getElementById('show-mobile-menu')

      if(mobileMenuIcon){
        mobileMenuIcon.addEventListener('click', () => {
          mobileMenuContent.classList.toggle('mobile-menu-active')
        })
      }

  // show mobile menu when click mobile menu icon


// hide mobile menu product when click  mobile menu icon
const closeMobileMenuIcon = document.getElementById('close-mobile-menu-icon');
if(closeMobileMenuIcon){
  closeMobileMenuIcon.addEventListener('click', () => {
          mobileMenuContent.classList.remove('mobile-menu-active')
        })
      }
