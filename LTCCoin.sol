pragma solidity ^0.4.18;

contract LTCProto {
	struct Patient {
		uint8 Patienttype;
		bytes32 hash1;
		bytes32 hash2;
		bytes32 hash3;
		bytes32 hash4;
		bytes32 hash5;
		bytes32 hash6;
		bytes32 hash7;
		bytes32 hash8;
		bytes32 hash9;
		bytes32 hashN;
	}
	
	mapping (uint32 => Patient) patientInfo;
    	address public owner;
    
    function LTCProto() public payable {
        owner = msg.sender;
    }
    
    modifier onlyOwner {
        if (msg.sender != owner) revert();
        _;
    }

// Need two parts
	function getPatientRecordA(uint32 patientID) public view returns (uint8 patienttype, bytes32 hash1, bytes32 hash2, bytes32 hash3, bytes32 hash4, bytes32 hash5){
	    return (patientInfo[patientID].Patienttype, patientInfo[patientID].hash1, patientInfo[patientID].hash2, patientInfo[patientID].hash3, patientInfo[patientID].hash4, patientInfo[patientID].hash5);
    }
    
	function getPatientRecordB(uint32 patientID) public view returns (uint8 patienttype, bytes32 hash6, bytes32 hash7, bytes32 hash8, bytes32 hash9, bytes32 hashN){
	    return (patientInfo[patientID].Patienttype, patientInfo[patientID].hash6, patientInfo[patientID].hash7, patientInfo[patientID].hash8, patientInfo[patientID].hash9, patientInfo[patientID].hashN);
	}

	function newPatient(uint32 patientID, uint8 typeID, bytes32 PRHash) onlyOwner public {
		Patient storage c = patientInfo[patientID];
		c.Patienttype = typeID;
		c.hash1 = PRHash;
	}

	// The following is already created in solidity
		//		function getPatient(uint32 patientID) public returns (uint type, hash1, hash2, hash3, hash4, hash5, hash6, hash7, hash 8, hash 9, hashN) { }

	function PatientHash2 (uint32 patientID, bytes32 Hash2) onlyOwner public {
		Patient storage c = patientInfo[patientID];
		c.hash2 = Hash2;
	}

	function PatientHash3 (uint32 patientID, bytes32 Hash3) onlyOwner public {
		Patient storage c = patientInfo[patientID];
		c.hash3 = Hash3;
	}

	function PatientHash4 (uint32 patientID, bytes32 Hash4) onlyOwner public {
		Patient storage c = patientInfo[patientID];
		c.hash4 = Hash4;
	}

	function PatientHash5 (uint32 patientID, bytes32 Hash5) onlyOwner public {
		Patient storage c = patientInfo[patientID];
		c.hash5 = Hash5;
	}

	function PatientHash6 (uint32 patientID, bytes32 Hash6) onlyOwner public {
		Patient storage c = patientInfo[patientID];
		c.hash6 = Hash6;
	}

	function PatientHash7 (uint32 patientID, bytes32 Hash7) onlyOwner public {
		Patient storage c = patientInfo[patientID];
		c.hash7 = Hash7;
	}

	function PatientHash8 (uint32 patientID, bytes32 Hash8) onlyOwner public {
		Patient storage c = patientInfo[patientID];
		c.hash8 = Hash8;
	}

	function PatientHash9 (uint32 patientID, bytes32 Hash9) onlyOwner public {
		Patient storage c = patientInfo[patientID];
		c.hash9 = Hash9;
	}

	function PatientHashN (uint32 patientID, bytes32 HashN) onlyOwner public {
		Patient storage c = patientInfo[patientID];
		c.hashN = HashN;
	}
}
