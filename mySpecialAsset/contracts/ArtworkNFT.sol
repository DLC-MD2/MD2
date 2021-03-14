pragma solidity 0.6.8;

import "@openzeppelin/contracts/token/ERC721/ERC721.sol";
import "@openzeppelin/contracts/utils/Counters.sol";



contract ArtworkNFT is ERC721{
    //todo overwrite transaction function
    using Counters for Counters.Counter;
    Counters.Counter private _uniqueIds;
    mapping(string => uint8) hashes; // maps the IPFS to tokens, will prevent issuing tokens mapped to a hash previously associated with another token

    constructor() public ERC721("ArtworkNFT", "AFT"){

    }

    function produceNFT(address recipient, string memory hash, string memory metadata)      //minting function,
    public                                                                                  //address is the wallet address of who will receive the NFT (buyer of art)
    returns(uint256){                                                                       //hash is the IPFS hash associated with the content of the NFT
        require(hashes[hash] != 1); //rejects call if hash has been used to mint before      //metadata refers to a link to the json metadata,  (dimensions of art, maybe a jpeg etc)
        hashes[hash] = 1;
        _uniqueIds.increment();
        uint256 newID = _uniqueIds.current();
        _mint(recipient, newID);
        _setTokenURI(newID, metadata);
        return newID;

    }
}
