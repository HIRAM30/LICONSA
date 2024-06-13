
	function mostrarcaja1() {
		document.getElementById('overlay1').style.display = 'flex';
	}
	function cerrarcaja1() {
		document.getElementById('overlay1').style.display = 'none';
	}
	function mostrarcaja2() {
		document.getElementById('overlay2').style.display = 'flex';
	}
	function cerrarcaja2() {
		document.getElementById('overlay2').style.display = 'none';
	}
	function mostrarcaja3() {
		document.getElementById('overlay3').style.display = 'flex';
	}
	function cerrarcaja3() {
		document.getElementById('overlay3').style.display = 'none';
	}
	function mostrarcaja4() {
		document.getElementById('overlay4').style.display = 'flex';
	}
	function cerrarcaja4() {
		document.getElementById('overlay4').style.display = 'none';
	}
	function mostrarcaja5() {
		document.getElementById('overlay5').style.display = 'flex';
	}
	function cerrarcaja5() {
		document.getElementById('overlay5').style.display = 'none';
	}
	function mostrarcaja6() {
		document.getElementById('overlay6').style.display = 'flex';
	}
	function cerrarcaja6() {
		document.getElementById('overlay6').style.display = 'none';
	}
	
/** 
	function mostrarcampos(){
		let dependiente=document.getElementById("numdependientes").value;
        let contenedor=document.getElementById("contenedordependientes");
        contenedor.innerHTML="";

        for (let i = 0; i < dependiente*3; i++) {
            let nuevoscampos = document.createElement("input");
        	nuevoscampos.type="text";
            contenedor.appendChild(nuevoscampos);
            contenedor.appendChild(document.createElement("br"));
        }
	}
                                                        
	function mostrarcampos() {
        const selectedValue = document.getElementById('numdependientes').value;
        const dependienteElements = document.querySelectorAll('.alt');

        // Oculta todas las opciones
        dependienteElements.forEach(element => {
            element.style.display = 'none';
        });

        // Muestra solo la opción seleccionada
        if (selectedValue !== '') {
            const selectedDependiente = document.getElementById(`alternativa-${selectedValue}`);
            if (selectedDependiente) {
                selectedDependiente.style.display = 'block';
                document.getElementById('contenedordependientes').innerText = '';				
            }
        } else {
            document.getElementById('contenedordependientes').innerText = 'Selecciona el número de dependientes';
        }
    }*/ 