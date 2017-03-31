<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonaType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nacionalidad', ChoiceType::class, array(
                    'choices' => array('Venezolana' => 'V', 'Extranjera' => 'E'),
                    'required' => true,
                    'label' => 'Nacionalidad',
                    'attr' => array('placeholder' => 'Nacionalidad')
                ))
                ->add('cedula', TextType::class, array(
                    'label' => 'Cédula / Pasaporte',
                    'required' => true,
                    'attr' => array('placeholder' => 'Número de Cédula / Pasaporte'),
                ))
                ->add('primerApellido', TextType::class, array(
                    'label' => 'Primer Apellido',
                    'required' => true,
                    'attr' => array('placeholder' => 'Primer Apellido'),
                ))
                ->add('segundoApellido', TextType::class, array(
                    'label' => 'Segundo Apellido',
                    'required' => true,
                    'attr' => array('placeholder' => 'Segundo Apellido'),
                ))
                ->add('primerNombre', TextType::class, array(
                    'label' => 'Primer Nombre',
                    'required' => true,
                    'attr' => array('placeholder' => 'Primer Nombre'),
                ))
                ->add('segundoNombre', TextType::class, array(
                    'label' => 'Segundo Nombre',
                    'required' => false,
                    'attr' => array('placeholder' => 'Segundo Nombre'),
                ))
                ->add('genero', ChoiceType::class, array(
                    'choices' => array('Femenino' => 'F', 'Masculino' => 'M'),
                    'required' => true,
                    'label' => 'Género',
                    'attr' => array('placeholder' => 'Género')
                ))
                ->add('fechaNacimiento', BirthdayType::class, array(
                    'placeholder' => array(
                        'year' => 'Año', 'month' => 'Mes', 'day' => 'Día',
                    ),
                    'label' => 'Fecha Nacimiento',
                ))
                ->add('correo', EmailType::class, array(
                    'required' => true,
                    'label' => 'Correo Electrónico',
                    'attr' => array('placeholder' => 'Correo Electrónico')
                ))
                ->add('foto', FileType::class, array(
                    'data_class' => null,
                    'required' => false,
                    'label' => 'Fotografía',
                    'attr' => array('placeholder' => 'File')))
                ->add('estadoCivil', ChoiceType::class, array(
                    'choices' => array('soltero' => 'Soltero', 'casado' => 'Casado', 'viudo' => 'Viudo', 'divorsiado' => 'Divorsiado', 'concubino' => 'Concubino'),
                    'required' => true,
                    'attr' => array('placeholder' => 'Estado Civil'),
                    'label' => 'Estado Civil',))
                ->add('telefono', TextType::class, array(
                    'required' => true,
                    'label' => 'Teléfono Personal',
                    'attr' => array('placeholder' => 'Teléfono Personal')
                ))
                ->add('comunidad')
                ->add('estudio', ChoiceType::class, array(
                    'choices' => array('primaria' => 'Primaria', 'Secundaria' => 'secundaria', 'Universitaria' => 'universitaria', 'Otro' => 'otro'),
                    'required' => true,
                    'attr' => array('placeholder' => 'Nivel de Instrucción'),
                    'label' => 'Nivel de Instrucción',));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Persona'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_persona';
    }

}
