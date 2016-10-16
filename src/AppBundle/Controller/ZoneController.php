<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Zone;
use AppBundle\Form\ZoneType;
use AppBundle\Repository\ZoneRepository;

/**
 * Zone controller.
 *
 * @Route("/admin/zones")
 */
class ZoneController extends Controller
{
    /**
     * Lists all Zone entities.
     *
     * @Route("/", name="admin_zones_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $zones = $em->getRepository('AppBundle:Zone')->findAll();

        $zone = new Zone();
        $form = $this->createForm('AppBundle\Form\ZoneType', $zone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // Recuperation du code
            $dernierId = $em->getRepository('AppBundle:Zone')->getDernierId();

            $zone->setCode($dernierId);
            $em->persist($zone);
            $em->flush();



            return $this->redirectToRoute('admin_zones_index');
        }

        return $this->render('zone/index.html.twig', array(
            'zones' => $zones,
            'zone' => $zone,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new Zone entity.
     *
     * @Route("/new", name="admin_zones_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $zone = new Zone();
        $form = $this->createForm('AppBundle\Form\ZoneType', $zone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zone);
            $em->flush();

            return $this->redirectToRoute('admin_zones_show', array('id' => $zone->getId()));
        }

        return $this->render('zone/new.html.twig', array(
            'zone' => $zone,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Zone entity.
     *
     * @Route("/{id}", name="admin_zones_show")
     * @Method("GET")
     */
    public function showAction(Zone $zone)
    {
        $deleteForm = $this->createDeleteForm($zone);

        return $this->render('zone/show.html.twig', array(
            'zone' => $zone,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Zone entity.
     *
     * @Route("/{id}/edit", name="admin_zones_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Zone $zone)
    {
        $deleteForm = $this->createDeleteForm($zone);
        $editForm = $this->createForm('AppBundle\Form\ZoneType', $zone);
        $editForm->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $zones = $em->getRepository('AppBundle:Zone')->findAll();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zone);
            $em->flush();

            return $this->redirectToRoute('admin_zones_index', array('id' => $zone->getId()));
        }

        return $this->render('zone/edit.html.twig', array(
            'zone' => $zone,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'zones' => $zones,
        ));
    }

    /**
     * Deletes a Zone entity.
     *
     * @Route("/{id}", name="admin_zones_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Zone $zone)
    {
        $form = $this->createDeleteForm($zone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($zone);
            $em->flush();
        }

        return $this->redirectToRoute('admin_zones_index');
    }

    /**
     * Creates a form to delete a Zone entity.
     *
     * @param Zone $zone The Zone entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Zone $zone)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_zones_delete', array('id' => $zone->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
