window.addEventListener('load', function () {
  const navTabs = document.querySelectorAll('.nav-tabs li');
  navTabs.forEach((tab) => {
    tab.addEventListener('click', (event) => {
      console.log('haha');
      event.preventDefault();
      document.querySelector('.nav-tabs li.active').classList.remove('active');
      document
        .querySelector('.tab-content .tab-pane.active')
        .classList.remove('active');
      event.currentTarget.classList.add('active');
      const tabPaneActiveId = event.target.getAttribute('href');
      console.log(tabPaneActiveId);
      document.querySelector(tabPaneActiveId).classList.add('active');
    });
  });
});
