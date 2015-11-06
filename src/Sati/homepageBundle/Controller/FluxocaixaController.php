<?php

namespace Sati\homepageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sati\homepageBundle\Entity\Fluxocaixa;
use Sati\homepageBundle\Form\FluxocaixaType;

/**
 * Fluxocaixa controller.
 *
 */
class FluxocaixaController extends Controller
{

    /**
     * Lists all Fluxocaixa entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SatihomepageBundle:Fluxocaixa')->findAll();

        return $this->render('SatihomepageBundle:Fluxocaixa:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Fluxocaixa entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Fluxocaixa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fluxocaixa'));
        }

        return $this->render('SatihomepageBundle:Fluxocaixa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Fluxocaixa entity.
     *
     * @param Fluxocaixa $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Fluxocaixa $entity)
    {
        $form = $this->createForm(new FluxocaixaType(), $entity, array(
            'action' => $this->generateUrl('fluxocaixa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Fluxocaixa entity.
     *
     */
    public function newAction()
    {
        $entity = new Fluxocaixa();
        $form   = $this->createCreateForm($entity);

        return $this->render('SatihomepageBundle:Fluxocaixa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Fluxocaixa entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SatihomepageBundle:Fluxocaixa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fluxocaixa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SatihomepageBundle:Fluxocaixa:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Fluxocaixa entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SatihomepageBundle:Fluxocaixa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fluxocaixa entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        $editForm->handleRequest($this->Fluxocaixa);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            /** @var Cashback $cashback */
            $fluxocaixa = $editForm->getData();

            $em->persist($fluxocaixa);
            $em->flush();
        }


        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Fluxocaixa entity.
    *
    * @param Fluxocaixa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Fluxocaixa $entity)
    {
        $form = $this->createForm(new FluxocaixaType(), $entity, array(
            'action' => $this->generateUrl('fluxocaixa_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Fluxocaixa entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SatihomepageBundle:Fluxocaixa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fluxocaixa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fluxocaixa_edit', array('id' => $id)));
        }

        return $this->render('SatihomepageBundle:Fluxocaixa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Fluxocaixa entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SatihomepageBundle:Fluxocaixa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fluxocaixa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fluxocaixa'));
    }

    /**
     * Creates a form to delete a Fluxocaixa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fluxocaixa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
