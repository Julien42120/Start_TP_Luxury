<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Repository\CandidatRepository;
use App\Repository\CandidatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\JobOfferRepository;
use App\Repository\UserRepository;

/**
     * @IsGranted("ROLE_ADMIN")
     *
     * @Security("is_granted('ROLE_ADMIN')", statusCode=404, message="Resource not found.")
     * 
     */

    /**
    * @Route("/admin")
    */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }


    /**
     * @Route("/job/offer", name="admin_job_offer_index")
     */
    public function job_offer_index(JobOfferRepository $jobOfferRepository): Response
    {
        return $this->render('admin/job_offer_index.html.twig', [
            'controller_name' => 'AdminController',
            'job_offers' => $jobOfferRepository->findAll()
        ]);
    }

      /**
     * @Route("/candidature/index", priority=1, name="admin_candidature_index")
     */
    public function candidature_index( CandidatureRepository $candidatureRepository ): Response
    {
        $allCandidature = $candidatureRepository->findAllwithJoin();
        return $this->render('admin/candidature_index.html.twig', [
            'candidatures'=>$allCandidature
        ]);
    }
}
