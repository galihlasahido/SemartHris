<?php

namespace KejawenLab\Application\SemartHris\DataTransformer;

use KejawenLab\Application\SemartHris\Component\Company\Repository\EmployeeRepositoryInterface;
use KejawenLab\Application\SemartHris\Component\Employee\Model\EmployeeInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@kejawenlab.com>
 */
final class EmployeeTransformer implements DataTransformerInterface
{
    /**
     * @var EmployeeRepositoryInterface
     */
    private $employeeRepository;

    /**
     * @param EmployeeRepositoryInterface $employeeRepository
     */
    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @param object $employee
     *
     * @return string
     */
    public function transform($employee): string
    {
        if (null === $employee) {
            return '';
        }

        return $employee->getId();
    }

    /**
     * @param string $employeeId
     *
     * @return null|EmployeeInterface
     */
    public function reverseTransform($employeeId)
    {
        if (!$employeeId) {
            return null;
        }

        $employee = $this->employeeRepository->find($employeeId);
        if (null === $employee) {
            throw new TransformationFailedException(sprintf('Employee with id %s is not exist.', $employeeId));
        }

        return $employee;
    }
}