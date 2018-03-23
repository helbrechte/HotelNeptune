<?php

namespace HotelBundle\Controller;

use HotelBundle\Entity\Chambre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Chambre controller.
 *
 * @Route("chambre")
 */
class ChambreController extends Controller
{
    /**
     * Lists all chambre entities.
     *
     * @Route("/index", name="chambre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $chambres = $em->getRepository('HotelBundle:Chambre')->findAll();

        return $this->render('chambre/index.html.twig', array(
            'chambres' => $chambres,
        ));
    }

    /**
     * Creates a new chambre entity.
     *
     * @Route("/new", name="chambre_new")
     * @Method({"GET", "POST"})
     *
     */
    public function newAction(Request $request)
    {
        $chambre = new Chambre();
        $form = $this->createForm('HotelBundle\Form\ChambreType', $chambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chambre);
            $em->flush();

            return $this->redirectToRoute('chambre_show', array('id' => $chambre->getId()));
        }

        return $this->render('chambre/new.html.twig', array(
            'chambre' => $chambre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a chambre entity.
     *
     * @Route("/{id}", name="chambre_show")
     * @Method("GET")
     */
    public function showAction(Chambre $chambre)
    {
        $deleteForm = $this->createDeleteForm($chambre);

        return $this->render('chambre/show.html.twig', array(
            'chambre' => $chambre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing chambre entity.
     *
     * @Route("/{id}/edit", name="chambre_edit")
     * @Method({"GET", "POST"})
     *
     */
    public function editAction(Request $request, Chambre $chambre)
    {
        $deleteForm = $this->createDeleteForm($chambre);
        $editForm = $this->createForm('HotelBundle\Form\ChambreType', $chambre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chambre_edit', array('id' => $chambre->getId()));
        }

        return $this->render('chambre/edit.html.twig', array(
            'chambre' => $chambre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a chambre entity.
     *
     * @Route("/{id}", name="chambre_delete")
     * @Method("DELETE")
     *
     */
    public function deleteAction(Request $request, Chambre $chambre)
    {
        $form = $this->createDeleteForm($chambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chambre);
            $em->flush();
        }

        return $this->redirectToRoute('chambre_index');
    }

    /**
     * Creates a form to delete a chambre entity.
     *
     * @param Chambre $chambre The chambre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Chambre $chambre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('chambre_delete', array('id' => $chambre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
