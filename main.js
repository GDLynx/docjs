window.doc = window.doc || {};

doc.element = function(_elem) {

    this.addClass = function(_class) {
        _elem.classList.add(_class);
    };

    this.get = function() {
        return _elem;
    }
};

doc.element_list = function(_list) {

    this.each = function(_cb) {
        var index = 0;
        Array.prototype.forEach.call(_list, function(elem) {
            _cb(index, new doc.element(elem));
            index++;
        })
    }
}

doc.id = function(_id) {
    return new doc.element(document.getElementById(_id));
};

doc.class = function(_class) {
    return new doc.element_list(document.getElementsByClassName(_class));
}