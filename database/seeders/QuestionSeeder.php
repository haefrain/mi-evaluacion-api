<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use App\Models\SubVariable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            ['Compromiso con el cambio', 'Asumo de manera entusiasta los nuevos retos que mi cargo exige.'],
            ['Normas', 'Conozco el Código de Integridad del AGN.'],
            ['Mitos e Historia', 'Conozco la trayectoria histórica del AGN.'],
            ['Promoción', 'Conozco los criterios de evaluación de mi desempeño.'],
            ['Asimilación del cambio', 'Considero que el cambio resulta necesario para el desarrollo organizacional.'],
            ['Creencias', 'Creo que el AGN genera mecanismos de protección ante situaciones de discriminación o acoso, para sus empleadas y empleados.'],
            ['Creencias', 'Creo que en el AGN las personas se preocupan por cumplir las normas y reglas.'],
            ['Aprovechamiento de las capacidades', 'Creo que tengo la oportunidad de desarrollarme profesionalmente en el AGN.'],
            ['Colaboración', 'Cuando una dependencia requiere de la colaboración de mi grupo, estamos dispuestas y dispuestos a atender sus requerimientos.'],
            ['Colaboración', 'Cuento con la colaboración de mis compañeras y compañeros, cuando lo necesito.'],
            ['Cordialidad y Buen trato', 'En mi grupo de trabajo o dependencia, compartimos espacios de socialización generados por nosotras y nosotros mismos.'],
            ['Trabajo en Equipo', 'Dentro de mi grupo de trabajo, cuando se presentan inconvenientes, es más importante solucionarlos que buscar al culpable.'],
            ['Tecnología Competitiva', 'El AGN  posee la tecnología me permite, desarrollar mi trabajo de manera adecuada.'],
            ['Interés por los empleados', 'El AGN facilita el acceso a planes y programas de formación, bienestar, recreación y deporte.'],
            ['Seguridad Industrial', 'El AGN cumple con las normas de bioseguridad y seguridad, para cuidar la salud de sus funcionarias y funcionarios.'],
            ['Recursos Físicos', 'El AGN provee los materiales y los recursos que requiero, para realizar mi trabajo.'],
            ['Servicio al cliente', 'El AGN es reconocido a nivel nacional como un referente en temas de memoria, archivo y patrimonio documental.'],
            ['Armonía', 'El ambiente de trabajo de mi grupo o dependencia es bueno.'],
            ['Interacción Jefe - Colaborador', 'El (la) coordinador(a) o Jefe de área me trata justamente y evita cualquier tipo de favoritismos.'],
            ['Autonomía', 'El(la) coordinador(a) o Jefe de mi grupo o dependencia,  me permite tomar decisiones de manera autónoma sin necesidad de consultarlas con él/ella.'],
            ['Supervisión Respetuosa', 'El(la) coordinador(a) o Jefe de mi grupo o dependencia se preocupa por conocer mis necesidades e intereses.'],
            ['Autonomía', 'El(la) coordinador(a) o Jefe de mi grupo o dependencia es claro(a) y específico(a) cuando define mis objetivos de trabajo o los del grupo.'],
            ['Estímulo y Soporte', 'El(la) coordinador(a) o Jefe de mi grupo o dependencia, escucha mis opiniones y las tiene en cuenta para las decisiones que toma.'],
            ['Congruencia', 'El equipo directivo demuestra congruencia entre lo que dice y lo que hace.'],
            ['Armonía', 'El lenguaje utilizado por las compañeras y compañeros dentro de las instalaciones del AGN, es respetuoso y adecuado.'],
            ['Carga Laboral', 'El personal frecuentemente termina su trabajo en el tiempo estipulado.'],
            ['Promoción', 'En el AGN existen posibilidades de ascenso y promoción.'],
            ['Mitos e Historia', 'En el AGN se acostumbra a conmemorar fechas importantes y representativas para la entidad.'],
            ['Ritos y Ceremonias', 'En el AGN se conmemoran fechas especiales como el día de la secretaria, navidad, entre otros.'],
            ['Creencias', 'En el AGN se promueve la detección de los errores, sin exponer públicamente al que lo comete.'],
            ['Estímulo al Mejoramiento', 'En el AGN se recibe formación para mejorar el desempeño.'],
            ['Cordialidad y Buen trato', 'En el AGN, entre compañeras y compañeros sobresale la cordialidad y el respeto.'],
            ['Valores', 'En mi equipo de trabajo son respetuosos de las diferencias culturales, sexuales y/o religiosas.'],
            ['Aceptación del cambio', 'Estoy de acuerdo con la afirmación que dice: "el cambio es una oportunidad, no una amenaza".'],
            ['Valores', 'Las funcionarios y funcionarios del AGN nos preocupamos por brindar una excelente atención a las y los usuarios.'],
            ['Interés por los empleados', 'Existe interés por el bienestar de las personas que laboran en el AGN.'],
            ['Lealtad', 'Existe sentido de pertenencia por parte del personal para con la Entidad.'],
            ['Rel Interpersonales', 'Existe un ambiente cordial, donde son escasos los conflictos entre compañeras y compañeros.'],
            ['Preparación para el Cambio', 'Frente a la incorporación de nuevas prácticas institucionales, se comunica y se capacita previamente al personal.'],
            ['Eficiencia', 'Hay alta participación y compromiso de los equipos de trabajo en el AGN.'],
            ['Congruencia', 'La actuación de la Alta Dirección se ajusta al Código de Integridad del AGN.'],
            ['Carga Laboral', 'La carga laboral asignada a mi empleo es adecuada.'],
            ['Interacción Jefe - Colaborador', 'Con mi jefe, tengo una comunicación fluida y constante.'],
            ['Actualidad Organizacional', 'La comunicación interna en el AGN es una actividad permanente y planificada.'],
            ['Mitos e Historia', 'La cultura del AGN no estimula los rumores y comentarios de pasillo.'],
            ['Ritos y Ceremonias', 'La entidad recurre a incentivos y reconocimientos, para premiar el buen desempeño.'],
            ['Tecnología Competitiva', 'La Entidad se preocupa por brindarme las herramientas que necesito para realizar mi trabajo.'],
            ['Recursos Físicos', 'En el espacio en el cual estoy trabajando, las condiciones de espacio, ruido, temperatura e iluminación, me permiten desempeñarlo con normalidad y comodidad.'],
            ['Recursos Físicos', 'Las sedes de la Entidad son adecuadas y no ponen en riesgo la seguridad de las y los funcionarios.'],
            ['Valores', 'Las personas compartimos los valores definidos por la Entidad y nos comprometemos de acuerdo a ellos.'],
            ['Compromiso con el cambio', 'Las personas en el AGN estamos abiertas a trabajar en los nuevos desafíos del entorno y de la Entidad.'],
            ['Aprovechamiento de las capacidades', 'Las personas que acceden a un cargo en el AGN lo hacen por mérito propio.'],
            ['Planeación', 'Las y los directivos del AGN brindan una orientación clara sobre los objetivos a alcanzar.'],
            ['Proyección', 'Las y los directivos del AGN tienen claro hacia dónde va la entidad y lo difunden a las colaboradoras y colaboradores.'],
            ['Eficiencia', 'Los equipos de trabajo son productivos en el Archivo General de la Nación.'],
            ['Lealtad', 'Las y los funcionarios del AGN evidencian sentido de pertenencia con sus grupos de trabajo.'],
            ['Aceptación del cambio', 'Ante situaciones de cambio que se presentan en el AGN, las funcionarias y funcionarios cambian sus comportamientos ajustándose a las nuevas condiciones.'],
            ['Identificación', 'Las funcionarias y funcionarios hablan bien del AGN.'],
            ['Estímulo y Soporte', 'Las(los) jefes y coordinadores(as) son un gran apoyo para que los y las funcionarias hagan bien su trabajo.'],
            ['Planeación', 'Los procesos están bien integrados entre sí en el AGN.'],
            ['Rel Interpersonales', 'Me llevo bien con mis compañeras y compañeros de trabajo.'],
            ['Supervisión Respetuosa', 'Me siento a gusto con la forma y el estilo con que mi jefe inmediato hace seguimiento a mi trabajo.'],
            ['Identificación', 'Me siento partícipe del Plan Estratégico del AGN.'],
            ['Servicio al cliente', 'Percibo que las colombianas y colombianos conocen qué es y qué hace el AGN.'],
            ['Orgullo', 'Pienso que el AGN es un buen lugar para trabajar y me gustaría continuar trabajando aquí.'],
            ['Planeación', 'Pocas veces se debe interrumpir el trabajo planeado para solucionar inconvenientes que surgen de manera inesperada en el AGN.'],
            ['Compromiso', 'Realizo mi trabajo de la mejor manera posible, porque se que con él contribuyo al cumplimiento de los objetivos del AGN.'],
            ['Actualidad Organizacional', 'Recibo a través de los canales oficiales de comunicación del AGN, información sobre las decisiones importantes que puedan afectar mi trabajo.'],
            ['Orgullo', 'Recomendaría al AGN a una amiga o amigo, como un excelente sitio para trabajar.'],
            ['Preparación para el Cambio', 'Revisamos continuamente la forma de mejorar el servicio interno y externo que prestamos en el AGN.'],
            ['Seguridad Industrial', 'Se desarrollan actividades tendientes a garantizar la seguridad y salud en el trabajo para las funcionarias y funcionarios del AGN.'],
            ['Estímulo al Mejoramiento', 'Se facilita el desarrollo de las habilidades y conocimientos en el AGN.'],
            ['Compromiso', 'Se percibe que las funcionarias y funcionarios se esfuerzan por cumplir con los objetivos trazados en la AGN.'],
            ['Normas', 'Se respetan las normas y figuras de autoridad en el AGN.'],
            ['Asimilación del cambio', 'Son bienvenidas por parte de las funcionarias y funcionarios del AGN, las iniciativas que buscan adaptación al entorno laboral cambiante'],
            ['Proyección', 'Tengo suficientemente claras mis responsabilidades dentro del AGN y se cómo contribuir con el logro de los objetivos de la Entidad.'],
            ['Trabajo en Equipo', 'Todas y todos los integrantes de mi equipo, trabajan hacia una meta común.'],
        ];

        $options = [
            ['Totalmente en desacuerdo', '1'],
            ['Parcialmente en desacuerdo', '2'],
            ['Parcialmente de acuerdo', '3'],
            ['Totalmente de acuerdo', '4'],
        ];

        $counter = 1;
        foreach($questions as $question){
            $questionMapped = [
                'sub_variable_id' => SubVariable::where('name', $question[0])->first()->id,
                'title' => $question[1],
                'description' => $question[1],
                'sort' => $counter,
            ];


            $newQuestion = Question::create($questionMapped);
            foreach ($options as $option)
            {
                Option::create([
                    'question_id' => $newQuestion->id,
                    'title' => $option[0],
                    'value' => $option[1]
                ]);
            }

            $counter++;
        }
    }
}
