"use strict";document.addEventListener("DOMContentLoaded",(function(){var e,t,n=document.querySelector(".seperator-and-logo");n&&(e=n,(t=new IntersectionObserver((function(n){n.forEach((function(n){n.isIntersecting&&(e.classList.add("loaded"),t.unobserve(e))}))}))).observe(e));var o=document.querySelectorAll(".is-style-cindylau-rainbow-text"),c=["color1","color2","color3","color4","color5"];o&&o.forEach((function(e){var t=e.textContent,n=t.split("").map((function(e,n){return" "===e||" "===e||"\t"===e||"\n"===e||"<"===e&&"<br>"===t.slice(n,n+4)?e:'<span class="default '.concat(c[Math.floor(Math.random()*c.length)],'">').concat(e,"</span>")})).join("");e.innerHTML=n;var o=e.querySelectorAll("span");o&&o.forEach((function(e){e.addEventListener("mouseenter",(function(t){e.classList.remove("default")})),e.addEventListener("mouseleave",(function(t){e.classList.add("default")}))}))}));var a=document.querySelectorAll(".badge-container .svg");a&&a.forEach((function(e){e.addEventListener("click",(function(t){var n=e.getBoundingClientRect(),o=window.innerWidth||document.documentElement.clientWidth,c=window.innerHeight||document.documentElement.clientHeight,a={top:(n.top+n.height/2)/c*100,left:(n.left+n.width/2)/o*100},r={position:{x:a.left,y:a.top},zIndex:5e3};function i(e,t){confetti(Object.assign({},r,t,{particleCount:Math.floor(200*e)}))}e.classList.add("jello-vertical"),setTimeout((function(e){i(.25,{spread:26,startVelocity:55}),i(.2,{spread:60}),i(.35,{spread:100,decay:.91,scalar:.8}),i(.1,{spread:120,startVelocity:25,decay:.92,scalar:1.2}),i(.1,{spread:120,startVelocity:45})}),300),setTimeout((function(t){e.classList.remove("jello-vertical")}),900)}))}))}));
//# sourceMappingURL=functions-dist.js.map