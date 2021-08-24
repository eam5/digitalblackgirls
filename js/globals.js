// ITEM TYPE FILTER (on change select)
const item_type_filter = (e) => {
    var current_url = window.location;
    var new_url = null;
    var select = document.querySelector("#item-type-selection select");
    var url = null;
    if (select.value) {
      let params = new URLSearchParams(window.location.search);
      let new_type_id = select.value;
      let current_type_id = params.get("type");
      if (current_type_id) {
        // if type param is already set, replace type param
        new_url = current_url.href.replace(
          "type=" + current_type_id,
          "type=" + new_type_id
        );
      } else {
        // otherwise, add new type param
        if (current_url.href.includes("?")) {
          // add to existing params
          new_url = current_url.href + "&type=" + new_type_id;
        } else {
          // set the sole param
          new_url = current_url.href + "?type=" + new_type_id;
        }
      }
      window.location.assign(new_url);
    }
  };  