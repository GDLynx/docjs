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
	_list = Array.from(_list);

    this.each = function(_cb) {
        var index = 0;

		for(; index < _list.length; index++) {
			_cb(index, new doc.element(_list[index]));
		}
    }
	
	this.class = function(_class) {
		var _newList = [];
		
		for(var i = 0; i < _list.length; i++) {
			var f = _list[i].getElementsByClassName(_class);
			for(var b = 0; b < f.length; b++) {
				_newList.push(f.item(b));
			}
		}
		
		_list = _newList;
		return this;
	}
}

doc.id = function(_id) {
    return new doc.element(document.getElementById(_id));
};

doc.class = function(_class) {
    return new doc.element_list(document.getElementsByClassName(_class));
}

doc.query = function(_query) {
	return new doc.element_list(document.querySelectorAll(_query));
}