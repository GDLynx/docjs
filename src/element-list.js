function ElementList(_list) {
	this.list = _list;
}

ElementList.prototype.findClass = function(_class) {
	var _newList = [];
	
	for(var i = 0; i < this.list.length; i++) {
		var f = this.list[i].getElementsByClassName(_class);
		for(var b = 0; b < f.length; b++) {
			_newList.push(f.item(b));
		}
	}
	
	return new ElementList(_newList.filter(function(value, index, self) { return self.indexOf(value) === index; }));
}

ElementList.prototype.find = function(_selector) {
	var _newList = [];
	
	for(var i = 0; i < this.list.length; i++) {
		var f = this.list[i].querySelectorAll(_selector);
		for(var b = 0; b < f.length; b++) {
			_newList.push(f.item(b));
		}
	}
	
	return new ElementList(_newList.filter(function(value, index, self) { return self.indexOf(value) === index; }));
}

ElementList.prototype.each = function(_cb) {
	var index = 0;

	for(; index < this.list.length; index++) {
		_cb(index, new doc.element(this.list[index]));
	}
}