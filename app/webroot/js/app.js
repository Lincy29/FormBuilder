define([
       "jquery" , "underscore" , "backbone"
       , "collections/snippets" , "collections/my-form-snippets"
       , "views/tab" , "views/my-form"
       , "text!data/input.json", "text!data/radio.json", "text!data/select.json", "text!data/buttons.json"
<<<<<<< HEAD
       , "text!templates/app/render.html", 
=======
       , "text!templates/app/render.html",  "text!templates/app/about.html",
>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
], function(
  $, _, Backbone
  , SnippetsCollection, MyFormSnippetsCollection
  , TabView, MyFormView
  , inputJSON, radioJSON, selectJSON, buttonsJSON
<<<<<<< HEAD
  , renderTab
=======
  , renderTab, aboutTab
>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
){
  return {
    initialize: function(){

      //Bootstrap tabs from json.
      new TabView({
        title: "Input"
        , collection: new SnippetsCollection(JSON.parse(inputJSON))
      });
      new TabView({
        title: "Radios / Checkboxes"
        , collection: new SnippetsCollection(JSON.parse(radioJSON))
      });
      new TabView({
        title: "Select"
        , collection: new SnippetsCollection(JSON.parse(selectJSON))
      });
      new TabView({
        title: "Buttons"
        , collection: new SnippetsCollection(JSON.parse(buttonsJSON))
      });
      new TabView({
        title: "Rendered"
        , content: renderTab
      });
<<<<<<< HEAD
      
=======
      new TabView({
        title: "About"
        , content: aboutTab
      });

>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
      //Make the first tab active!
      $("#components .tab-pane").first().addClass("active");
      $("#formtabs li").first().addClass("active");

      $('#toggle_bs_style').on('click', function(e) {
        e.preventDefault();
        if ($('#bootstrap-classic-theme').attr('href') == '') {
          $('#bootstrap-classic-theme').attr('href', 'assets/css/lib/bootstrap-3.0.0/dist/css/bootstrap-theme.min.css');
        } else {
          $('#bootstrap-classic-theme').attr('href', '');
        }

      });

      // Bootstrap "My Form" with 'Form Name' snippet.
      new MyFormView({
        title: "Original"
        , collection: new MyFormSnippetsCollection([
          { "title" : "Form Name"
            , "fields": {
              "name" : {
                "label"   : "Form Name"
                , "type"  : "input"
                , "value" : "Form Name"
              }
            }
          }
        ])
      });
    }
  }
});
