//////////////////////////////////////////////////////////
//////////////////////// SOMMAIRE ////////////////////////
// 01_Gestion du bouton d'accès au menu
// 02_Mise en marche/arrêt video.banner
// 03_Insertion d'une image en fallback si dysfonctionnement video
// 04_Initialisation de simpleParallax
// 05_Initialisation de swiper.js
// 06_Gestion des sections et des titres avec l'API Intersection Observer
// 07_Initialisation de GSAP
//////////////////////////////////////////////////////////

document.addEventListener("DOMContentLoaded", () => {
  //////////////////////////////////////////////////////////
  // 01_Gestion du bouton d'accès au menu
  //////////////////////////////////////////////////////////

  const icons = document.querySelector("#icons");
  const navbar = document.querySelector(".main-navigation");

  icons.addEventListener("click", () => {
    navbar.classList.toggle("active");
  });

  const video = document.querySelector(".banner__video");
  const fallbackImg = document.querySelector(".fallbackImage");
  const bannerBg = document.querySelector(".banner__background");

  //////////////////////////////////////////////////////////
  // 02_Mise en lecture/arrêt video.banner
  //////////////////////////////////////////////////////////

  function playPause() {
    if (video.paused) {
      video.play();
    } else {
      video.pause();
    }
  }

  // Evénement loadeddata pour vérifier si la vidéo est chargée
  let videoLoaded = false;
  video.addEventListener("loadeddata", () => {
    videoLoaded = true;
    checkBg();
    console.log("La vidéo est chargée.");
  });

  // Evénement click pour jouer ou suspendre la lecture vidéo
  bannerBg.addEventListener("click", () => {
    playPause();
  });

  //////////////////////////////////////////////////////////
  // 03_Insertion d'une image en fallback si dysfonctionnement video
  //////////////////////////////////////////////////////////

  function displayImageBg() {
    video.style.display = "none";
    fallbackImg.style.display = "flex";
  }

  // Vérification de l'élément d'arrière-plan affiché dans la bannière
  function checkBg() {
    // Chargement d'une image fallback après 10s si la vidéo n'est pas chargée
    setTimeout(() => {
      if (!videoLoaded) {
        displayImageBg();
      } else {
        playPause();
      }
    }, 10000);
  }

  //////////////////////////////////////////////////////////
  // 04_Initialisation de simpleParallax
  //////////////////////////////////////////////////////////

  const logoImg = document.querySelector(".banner__logo--img");

  new simpleParallax(logoImg, {
    overflow: true,
    orientation: "left",
    transition: "cubic-bezier(0,0,0,1)",
    delay: 0.6,
  });

  console.log(simpleParallax);

  //////////////////////////////////////////////////////////
  // 05_Initialisation de swiper.js
  //////////////////////////////////////////////////////////

  const swiper = new Swiper(".swiper-container", {
    // Paramètres personnalisés
    direction: "horizontal",
    spaceBetween: 60,
    speed: 680,
    autoplay: {
      delay: 150,
    },
    effect: "coverflow",
    loop: true,
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 59,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: false,
    },
    //Activation automatique du carrousel
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      320: {
        spaceBetween: 150,
      },
      475: {
        spaceBetween: 150,
      },

      520: {
        spaceBetween: 170,
      },

      1193: {
        spaceBetween: 49,
      },

      1320: {
        spaceBetween: 60,
      },
    },
  });

  //////////////////////////////////////////////////////////
  // 06_Gestion des sections et des titres avec l'API Intersection Observer
  //////////////////////////////////////////////////////////

  // Activation des animations des sections et des titres en fonction du défilement de la page
  const sectionsUp = document.querySelectorAll(".fadeInUp");
  const sectionsDown = document.querySelectorAll(".fadeInDown");
  const titlesUp = document.querySelectorAll(".slideInUp");

  const options = {
    root: null,
    threshold: 0.06,
    rootMargin: "0px",
  };

  const addShowClass = (element) => {
    if (!element.classList.contains("appear")) {
      element.classList.add("appear");
    }
  };

  const removeShowClass = (element) => {
    if (element.classList.contains("appear")) {
      element.classList.remove("appear");
    }
  };
  const handleIntersect = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        addShowClass(entry.target);
      } else {
        removeShowClass(entry.target);
      }
    });
  };

  const displayOnScroll = new IntersectionObserver(handleIntersect, options);

  sectionsUp.forEach((section) => {
    displayOnScroll.observe(section);
  });
  sectionsDown.forEach((section) => {
    displayOnScroll.observe(section);
  });
  titlesUp.forEach((title) => {
    displayOnScroll.observe(title);
  });

  //////////////////////////////////////////////////////////
  // 07_Initialisation de GSAP
  //////////////////////////////////////////////////////////

  // Importation de GSAP avec le plugin ScrollTrigger
  gsap.registerPlugin(ScrollTrigger);

  // Sélection des éléments .cloud-before et .cloud-after
  const cloudBefore = document.querySelector(".cloud-before");
  const cloudAfter = document.querySelector(".cloud-after");

  // Initialisation du plugin
  const parallaxTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: "#place",
      start: "top 60%",
      end: "bottom bottom",
      scrub: true, // Activation du mode "scrub" pour synchroniser l'animation avec le scroll
    },
  });

  // Ajout d'un effet parallaxe pour chaque nuage
  parallaxTimeline.to(
    cloudBefore,
    { x: "-300px", duration: 1, ease: "power1.out" },
    0
  );
  parallaxTimeline.to(
    cloudAfter,
    { x: "-300px", duration: 1, ease: "power1.out" },
    0
  );
});
