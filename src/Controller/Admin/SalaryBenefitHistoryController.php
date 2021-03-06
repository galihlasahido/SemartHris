<?php

declare(strict_types=1);

namespace KejawenLab\Application\SemartHris\Controller\Admin;

use Doctrine\ORM\QueryBuilder;
use KejawenLab\Application\SemartHris\Form\Manipulator\BenefitHistoryManipulator;
use KejawenLab\Application\SemartHris\Repository\SalaryBenefitHistoryRepository;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class SalaryBenefitHistoryController extends AdminController
{
    /**
     * @param object $entity
     * @param string $view
     *
     * @return \Symfony\Component\Form\FormBuilderInterface
     */
    protected function createEntityFormBuilder($entity, $view)
    {
        $builder = parent::createEntityFormBuilder($entity, $view);

        return $this->container->get(BenefitHistoryManipulator::class)->manipulate($builder, $entity);
    }

    /**
     * @param string $entityClass
     * @param string $sortDirection
     * @param null   $sortField
     * @param null   $dqlFilter
     *
     * @return QueryBuilder
     */
    protected function createListQueryBuilder($entityClass, $sortDirection, $sortField = null, $dqlFilter = null)
    {
        return SalaryBenefitHistoryRepository::createListQueryBuilder($this->request, $this->getDoctrine(), $sortDirection, $sortField, $dqlFilter);
    }
}
