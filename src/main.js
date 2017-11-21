// @prepros-append element.js
// @prepros-append element-list.js

window.doc = {};

doc.id = function(_id) {
    return new Element(document.getElementById(_id));
};

doc.class = function(_class) {
    return new ElementList(document.getElementsByClassName(_class));
}

doc.query = function(_query) {
	return new ElementList(document.querySelectorAll(_query));
}