

<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<?php
echo'<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#237afc"
    },
    "button": {
      "background": "#fff",
      "text": "#237afc"
    }
  },
  "theme": "edgeless",
  "position": "bottom",
  "content": {
    "message": "'.$vocabSite[2].'",
    "dismiss": "'.$vocabSite[3].'",
    "link": "'.$vocabSite[4].'",
    "href": "policy"
  }
});
</script>'; ?>