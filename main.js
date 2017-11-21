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

function Element(_elem) {
	this.elem = elem;
}

Element.prototype.addClass = function(_class) {
	this.elem.classList.add(_class);
};

Element.prototype.get = function() {
	return this.elem;
}


function ElementList(_list) {
	// this.list = Array.from(_list);
	this.list = _list;
	
    this.each = function(_cb) {
        var index = 0;

		for(; index < this.list.length; index++) {
			_cb(index, new doc.element(this.list[index]));
		}
    }

}

ElementList.prototype.class = function(_class) {
	var _newList = [];
	
	for(var i = 0; i < this.list.length; i++) {
		var f = this.list[i].getElementsByClassName(_class);
		for(var b = 0; b < f.length; b++) {
			_newList.push(f.item(b));
		}
	}
	
	return new ElementList(_newList);
}