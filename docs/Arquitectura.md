#Arquitectura

Hemos seguido una qruitectura Monolitica Tradicional debido a la sencillez de esa, ya que nos permite implementar en un unico servidor todos los programas

Gracias ha esto conseguimos centralizar los logs y tener una trazabilidad simple

Debido a su sencillez esta carece de una escalabilidad horizontal, solo hay un unico punto de fallo, el cual es el propio servidor

Aunque debido a la simplicidad del proyecto y crremos que es una buena arquitectura, si buscasemos mejorar nuestra arquitectura seria mejor cambiarla a una de Microservicios, debido a que con esta implementariamos en un servidor diferente los programas apache2, mysql y php.
