
new Sortable(list__container, {
    animation: 150,
    store: {
		/**
		 * Get the order of elements. Called once during initialization.
		 * @param   {Sortable}  sortable
		 * @returns {Array}
		 */
		get: function (sortable) {
			var order = localStorage.getItem(sortable.options.group.name);
			return order ? order.split('|') : [];
		},

		/**
		 * Save the order of elements. Called onEnd (when the item is dropped).
		 * @param {Sortable}  sortable
		 */
		set: function (sortable) {
			var order = sortable.toArray();
			localStorage.setItem(sortable.options.group.name, order.join('|'));
		}
    }
});

new Sortable(list1, {
    group: 'shared', // set both lists to same group
    filter: '.list__name', // not draggable
    animation: 150,
    store: {
		/**
		 * Get the order of elements. Called once during initialization.
		 * @param   {Sortable}  sortable
		 * @returns {Array}
		 */
		get: function (sortable) {
			var order = localStorage.getItem(sortable.options.id);
			return order ? order.split('|') : [];
		},

		/**
		 * Save the order of elements. Called onEnd (when the item is dropped).
		 * @param {Sortable}  sortable
		 */
		set: function (sortable) {
			var order = sortable.toArray();
			localStorage.setItem(sortable.options.id, order.join('|'));
		}
    }
});

new Sortable(list2, {
    group: 'shared',
    filter: '.list__name', // not draggable
    animation: 150,
    store: {
		/**
		 * Get the order of elements. Called once during initialization.
		 * @param   {Sortable}  sortable
		 * @returns {Array}
		 */
		get: function (sortable) {
			var order = localStorage.getItem(sortable.options.group.name);
			return order ? order.split('|') : [];
		},

		/**
		 * Save the order of elements. Called onEnd (when the item is dropped).
		 * @param {Sortable}  sortable
		 */
		set: function (sortable) {
			var order = sortable.toArray();
			localStorage.setItem(sortable.options.group.name, order.join('|'));
		}
    }
});

new Sortable(list3, {
    group: 'shared', // set both lists to same group
    filter: '.list__name', // not draggable
    animation: 150,
    store: {
		/**
		 * Get the order of elements. Called once during initialization.
		 * @param   {Sortable}  sortable
		 * @returns {Array}
		 */
		get: function (sortable) {
			var order = localStorage.getItem(sortable.options.group.name);
			return order ? order.split('|') : [];
		},

		/**
		 * Save the order of elements. Called onEnd (when the item is dropped).
		 * @param {Sortable}  sortable
		 */
		set: function (sortable) {
			var order = sortable.toArray();
			localStorage.setItem(sortable.options.group.name, order.join('|'));
		}
    }
});

new Sortable(list4, { 
    group: 'shared',
    filter: '.list__name', // not draggable
    animation: 150,
    store: {
		/**
		 * Get the order of elements. Called once during initialization.
		 * @param   {Sortable}  sortable
		 * @returns {Array}
		 */
		get: function (sortable) {
			var order = localStorage.getItem(sortable.options.group.name);
			return order ? order.split('|') : [];
		},

		/**
		 * Save the order of elements. Called onEnd (when the item is dropped).
		 * @param {Sortable}  sortable
		 */
		set: function (sortable) {
			var order = sortable.toArray();
			localStorage.setItem(sortable.options.group.name, order.join('|'));
		}
    }
});




//Crear elementos
//Poder editar elementos
//Eliminar elementos
//Guardar orden de diferentes listas
//Guardar nombre editado de las listas



// listname.addEventListener('onkeyup', function() {
//     localStorage.setItem(listname, listname.innerHTML);

// })

// var lista1 = document.getElementById('list1');
// lista1.innerHTML = '';
// var lista2 = document.getElementById('list2');
// lista2.innerHTML = '';
// var lista3 = document.getElementById('list3');
// lista3.innerHTML = '';
// var lista4 = document.getElementById('list4');
// lista4.innerHTML = '';

// const addForm = document.querySelector('.add');
 
// addForm.addEventListener('submit', e => {
//     e.preventDefault();
//     const newToDo = addForm.add.value;
//     console.log(newToDo);
// });

