 <div x-data="{
     isFullScreen: false,
     toggleFullScreen() {
         this.isFullScreen = !this.isFullScreen;
         const doc = window.document;
         const docEl = doc.documentElement;
 
         const requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl
             .webkitRequestFullScreen || docEl.msRequestFullscreen;
         const cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc
             .msExitFullscreen;
 
         if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc
             .msFullscreenElement) {
             requestFullScreen.call(docEl);
         } else {
             cancelFullScreen.call(doc);
         }
     }
 }">
     <!-- Screen Switcher Trigger -->
     <button @click="toggleFullScreen()" id="screen-toggle" data-tooltip-target="tooltip-screen-toggle"
         data-tooltip-placement="top" type="button"
         class="inline-flex justify-center p-2 text-gray-500 bg-white border border-gray-200 rounded-full shadow-sm hover:text-gray-900 dark:border-gray-600 dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
         <x-tabler-maximize class="w-5 h-5" x-show="!isFullScreen" />
         <x-tabler-minimize class="w-5 h-5" x-show="isFullScreen" />
     </button>
     <!-- Screen Switcher Tooltip -->
     <div id="tooltip-screen-toggle" role="tooltip"
         class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
         <span x-text="isFullScreen ? 'Exit Fullscreen' : 'Enter Fullscreen'"></span>
         <div class="tooltip-arrow" data-popper-arrow></div>
     </div>
 </div>
