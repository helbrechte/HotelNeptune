<?php

namespace HotelBundle\Controller;

use HotelBundle\Entity\Chambre;
use HotelBundle\Entity\Reservation;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Reservation controller.
 *
 * @Route("reservation")
 */
class ReservationController extends Controller
{
    /**
     * Lists all reservation entities.
     *
     * @Route("/", name="reservation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('HotelBundle:Reservation')->findAll();

        return $this->render('reservation/index.html.twig', array(
            'reservations' => $reservations,
            'user' => $user,
        ));
    }

    /**
     * Creates a new reservation entity.
     *
     * @Route("/{id}/new", name="reservation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request , Chambre $chambre)
    {
        $reservation = new Reservation();
        $user = $this->getUser();
        $reservation->setClient($user);
        $reservation->setChambre($chambre);
        $reservation->getChambre()->setReserved(1);
        $form = $this->createForm('HotelBundle\Form\ReservationType', $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465 , 'ssl'))
                ->setUsername('%mailer_user%')
                ->setPassword('%mailer_password%');
                ;
// Swift mailer qui ne marche pas
            $mail = new Swift_Mailer($transport);
            $message = (new Swift_Message('Test mail'))
                ->setFrom('j.delaunay66@gmail.com')
                ->setTo('j.delaunay66@gmail.com')
                ->setBody('Test de mail');
            $result = $mail->send($message);
            return $this->redirectToRoute('reservation_show', array('id' => $reservation->getId()));
        }

        return $this->render('reservation/new.html.twig', array(
            'reservation' => $reservation,
            'chambre' => $chambre,
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reservation entity.
     *
     * @Route("/{id}", name="reservation_show")
     * @Method("GET")
     */
    public function showAction(Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('reservation/show.html.twig', array(
            'reservation' => $reservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservation entity.
     *
     * @Route("/{id}/edit", name="reservation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);
        $editForm = $this->createForm('HotelBundle\Form\ReservationType', $reservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservation_edit', array('id' => $reservation->getId()));
        }

        return $this->render('reservation/edit.html.twig', array(
            'reservation' => $reservation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservation entity.
     *
     * @Route("/{id}", name="reservation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reservation $reservation)
    {
        $reservation->getChambre()->setReserved(0);
        $form = $this->createDeleteForm($reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservation);
            $em->flush();
        }

        return $this->redirectToRoute('reservation_index');
    }

    /**
     * Creates a form to delete a reservation entity.
     *
     * @param Reservation $reservation The reservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservation $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservation_delete', array('id' => $reservation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
