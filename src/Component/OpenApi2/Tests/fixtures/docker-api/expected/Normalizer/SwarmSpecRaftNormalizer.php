<?php

namespace Docker\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Docker\Api\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class SwarmSpecRaftNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\Api\\Model\\SwarmSpecRaft';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\Api\\Model\\SwarmSpecRaft';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\Api\Model\SwarmSpecRaft();
        $validator = new \Docker\Api\Validator\SwarmSpecRaftValidator();
        if (!($data['skip_validation'] ?? false)) {
            $validator->validate($data);
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('SnapshotInterval', $data)) {
            $object->setSnapshotInterval($data['SnapshotInterval']);
        }
        if (\array_key_exists('KeepOldSnapshots', $data)) {
            $object->setKeepOldSnapshots($data['KeepOldSnapshots']);
        }
        if (\array_key_exists('LogEntriesForSlowFollowers', $data)) {
            $object->setLogEntriesForSlowFollowers($data['LogEntriesForSlowFollowers']);
        }
        if (\array_key_exists('ElectionTick', $data)) {
            $object->setElectionTick($data['ElectionTick']);
        }
        if (\array_key_exists('HeartbeatTick', $data)) {
            $object->setHeartbeatTick($data['HeartbeatTick']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getSnapshotInterval()) {
            $data['SnapshotInterval'] = $object->getSnapshotInterval();
        }
        if (null !== $object->getKeepOldSnapshots()) {
            $data['KeepOldSnapshots'] = $object->getKeepOldSnapshots();
        }
        if (null !== $object->getLogEntriesForSlowFollowers()) {
            $data['LogEntriesForSlowFollowers'] = $object->getLogEntriesForSlowFollowers();
        }
        if (null !== $object->getElectionTick()) {
            $data['ElectionTick'] = $object->getElectionTick();
        }
        if (null !== $object->getHeartbeatTick()) {
            $data['HeartbeatTick'] = $object->getHeartbeatTick();
        }
        $validator = new \Docker\Api\Validator\SwarmSpecRaftValidator();
        if (!($data['skip_validation'] ?? false)) {
            $validator->validate($data);
        }
        return $data;
    }
}