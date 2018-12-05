;(function(window) {

  function ListPicker(settings) {
    this._settings = settings;
    this._build();
  }

  ListPicker.prototype.getPicks = function() {
    return this._pickerPicks();
  }

  ListPicker.prototype._build = function() {
    this._pickerBuild();
    this._optionsBuild();
    this._picksBuild();
  }

  ListPicker.prototype._pickerBuild = function() {
    this._elem = {};
    this._elem.options = document.querySelector('#options');
    this._elem.picks = document.querySelector('#picks');
    this._elem.list = document.querySelector('.list-picker-list');
    this._elem.item = document.querySelector('.list-picker-list-item');
    this._vals = {};
    this._vals.reset = this._settings.reset || 0;
    this._vals.itemGap = this._settings.gap || 0;
    this._vals.itemWidth = this._elem.item.offsetWidth;
    this._vals.itemHeight = this._elem.item.offsetHeight;
  }

  ListPicker.prototype._pickerPicks = function() {
    var items = this._elem.picks.querySelectorAll('.list-picker-list-item');
    var picks = [];
    for (var i = 0; i < items.length; i++) {
      picks.push(items[i].dataset.optionValue);
    }
    return picks;
  }

  ListPicker.prototype._pickerResetAscend = function(items) {
    this._vals.position = 0;
    for (var i = 0; i < this._settings.list.length; i++) {
      for (var j = 0; j < items.length; j++) {
        if (i === parseInt(items[j].dataset.optionIndex)) {
          if (i) {
            items[j].style.top = (this._vals.position * (this._vals.itemHeight + this._vals.itemGap)) + 'px';
            items[j].style.left = '0px';
          } else {
            items[j].style.top = (this._vals.position * this._vals.itemHeight) + 'px';
            items[j].style.left = '0px';
          }
          this._vals.position++;
        }
      }
    }
  }

  ListPicker.prototype._pickerResetDescend = function(items) {
    this._vals.position = 0;
    for (var i = (this._settings.list.length - 1); i >= 0; i--) {
      for (var j = 0; j < items.length; j++) {
        if (i === parseInt(items[j].dataset.optionIndex)) {
          if (i < (this._settings.list.length - 1)) {
            items[j].style.top = (this._vals.position * (this._vals.itemHeight + this._vals.itemGap)) + 'px';
            items[j].style.left = '0px';
          } else {
            items[j].style.top = (this._vals.position * this._vals.itemHeight) + 'px';
            items[j].style.left = '0px';
          }
          this._vals.position++;
        }
      }
    }
  }

  ListPicker.prototype._pickerResetKeep = function(items) {
    for (var i = 0; i < items.length; i++) {
      items[i].style.left = '0px';
    }
  }

  ListPicker.prototype._pickerResetShuffle = function(items) {
    for (var i = 0; i < items.length; i++) {
      if (i) {
        items[i].style.top = (i * (this._vals.itemHeight + this._vals.itemGap)) + 'px';
        items[i].style.left = '0px';
      } else {
        items[i].style.top = (i * this._vals.itemHeight) + 'px';
        items[i].style.left = '0px';
      }
    }
  }

  ListPicker.prototype._optionsBuild = function() {
    this._elem.options.innerHTML = '';
    this._elem.options.style.height = ((this._settings.list.length * (this._vals.itemHeight + this._vals.itemGap)) - this._vals.itemGap) + 'px';
    this._elem.options.addEventListener('click', this._optionsClick.bind(this), false);
    for (var i = 0; i < this._settings.list.length; i++) {
      var item = this._elem.item.cloneNode(true);
      var value = this._settings.list[i];
      item.setAttribute('data-option-index', i);
      item.setAttribute('data-option-value', value);
      if (this._settings.content) {
      } else {
        item.textContent = (i + 1);
      }
      if (i) {
        item.style.top = (i * (this._vals.itemHeight + this._vals.itemGap)) + 'px';
        item.style.left = '0px';
      } else {
        item.style.top = (i * this._vals.itemHeight) + 'px';
        item.style.left = '0px';
      }
      this._elem.options.appendChild(item);
    }
  }

  ListPicker.prototype._optionsClick = function(e) {
    if (e.target.classList.contains('list-picker-list-item')) {
      this._optionsSwitch(e.target);
      setTimeout(this._optionsReset.bind(this), 1);
      setTimeout(this._picksReset.bind(this), 1);
    }
  }

  ListPicker.prototype._optionsSwitch = function(item) {
    item.style.top = item.style.top;
    item.style.left = (item.offsetLeft - (this._elem.picks.offsetLeft - this._elem.options.offsetLeft)) + 'px';
    this._elem.picks.appendChild(item);
  }

  ListPicker.prototype._optionsReset = function() {
    var items = this._elem.options.querySelectorAll('.list-picker-list-item');
    if (this._vals.reset) {
      switch(this._settings.order) {
        case 'asc':
          this._pickerResetAscend(items);
          break;
        case 'desc':
          this._pickerResetAscend(items);
          break;
        default:
          this._pickerResetShuffle(items);
      }
    } else {
      this._pickerResetKeep(items);
    }
  }

  ListPicker.prototype._picksBuild = function() {
    this._elem.picks.innerHTML = '';
    this._elem.picks.style.height = ((this._settings.list.length * (this._vals.itemHeight + this._vals.itemGap)) - this._vals.itemGap);
    this._elem.picks.addEventListener('click', this._picksClick.bind(this), false);
  }

  ListPicker.prototype._picksClick = function(e) {
    if (e.target.classList.contains('list-picker-list-item')) {
      this._picksSwitch(e.target);
      setTimeout(this._optionsReset.bind(this), 1);
      setTimeout(this._picksReset.bind(this), 1);
    }
  }

  ListPicker.prototype._picksSwitch = function(item) {
    item.style.top = item.style.top;
    item.style.left = (item.offsetLeft - (this._elem.options.offsetLeft - this._elem.picks.offsetLeft)) + 'px';
    this._elem.options.appendChild(item);
  }

  ListPicker.prototype._picksReset = function() {
    var items = this._elem.picks.querySelectorAll('.list-picker-list-item');
    if (this._vals.reset) {
      switch(this._settings.order) {
        case 'asc':
          this._pickerResetAscend(items);
          break;
        case 'desc':
          this._pickerResetDescend(items);
          break;
        default:
          this._pickerResetShuffle(items);
      }
    } else {
      this._pickerResetKeep(items);
    }
  }

  return window['ListPicker'] = ListPicker;

}(window));