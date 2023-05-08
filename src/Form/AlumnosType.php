<?php

namespace App\Form;

use App\Entity\Alumnos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlumnosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('correo')
            ->add('correoinst')
            ->add('cubiculo',ChoiceType::class, [
                'choices'  => [
                    '106'=>'106',
                    '130'=>'130',
                    '131'=>'131',
                    '137'=>'137',
                    '138'=>'138',
                    '307'=>'307',
                    'Infinito'=>'Infinito',
                    'Sótano'=>'Sótano',
                ],
                'placeholder' => 'Seleccionar',
            ])
            ->add('asesor',ChoiceType::class, [
                'choices'  => [
                    'Abdon Eddy Choque Rivero'=>'Abdon Eddy Choque Rivero',
                    'Daniel Duarte'=>'Daniel Duarte',
                    'Edgardo Roldan Pensado'=>'Edgardo Roldan Pensado',
                    'Elena Kaikina'=>'Elena Kaikina',
                    'Eugenio Martín Azpeitia Espinosa'=>'Eugenio Martín Azpeitia Espinosa',
                    'Eugenio Pacelli Balanzario Gutiérrez'=>'Eugenio Pacelli Balanzario Gutiérrez',
                    'Gerardo Alberto Raggi Cárdenas'=>'Gerardo Alberto Raggi Cárdenas',
                    'Leonardo Salmerón Castro'=>'Leonardo Salmerón Castro',
                    'Luis Abel Castorena Martínez'=>'Luis Abel Castorena Martínez',
                    'Jesús Hernández Hernández'=>'Jesús Hernández Hernández',
                    'Jesús Ruperto Muciño Raymundo'=>'Jesús Ruperto Muciño Raymundo',
                    'José Antonio Zapata Ramírez'=>'José Antonio Zapata Ramírez',
                    'José Ferrán Vázquez Lorenzo'=>'José Ferrán Vázquez Lorenzo',
                    'Noé Bárcenas Torres'=>'Noé Bárcenas Torres',
                    'Osvaldo Guzmán González'=>'Osvaldo Guzmán González',
                    'Raymundo Bautista Ramos'=>'Raymundo Bautista Ramos',
                    'Ulises Ariet Ramos García'=>'Ulises Ariet Ramos García',
                    'Salvador García Ferreira'=>'Salvador García Ferreira',

                ],
                'placeholder' => 'Seleccionar',
            ])
            ->add('areas')
            ->add('intereses')
            ->add('pagina',null,[
                'required'=>false,
                'empty_data'=>''
            ])
            ->add('grado',ChoiceType::class, [
                'choices'  => [
                    'Doctorado'=>'Doctorado',
                    'Maestría'=>'Maestría',

                ],
                'placeholder' => 'Seleccionar',
            ])
            ->add('semestre',ChoiceType::class, [
                'choices'  => [
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3',
                    '4'=>'4',
                    '5'=>'5',
                    '6'=>'6',
                    '7'=>'7',
                    '8'=>'8',
                ],
                'placeholder' => 'Seleccionar',
            ])
            ->add('aviso',null, [
                'required'=>true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Alumnos::class,
        ]);
    }
}
