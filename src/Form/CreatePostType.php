<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\FormEvent;
use App\Form\DateTimePickerType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CreatePostType extends AbstractType
{
    private $slugger;

    // Form types are services, so you can inject other services in them if needed
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'Title'])
            ->add('content', null, [
                'label' => 'Content',
                'attr' => ['rows' => 20]
            ])
//            ->add('publish_at', DateTimeType::class, [
//                'label' => 'Choose DateTime',
//            ])
            ->add('myRadio',RadioType::class,[
                'mapped' => false
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Create new'
            ])
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                /** @var Post */
                $post = $event->getData();
                $postTitle = $post->getTitle();
                if (null !== $postTitle) {
                    $post->setSlug($this->slugger->slug($postTitle)->lower());
                }
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
